<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Models\BankOrderDetail;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\BankOrder;
use App\Models\User;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($request->filled('search') || $request->has('length')){
            $request->flash();
            $search = $request->get('search');
            $length = (!empty($request->get('length'))) ? $request->get('length') : 10;

            if ($user->bank){
                $list = $user->bank->orders()
                    ->where('name','like','%'.$search.'%')
                    ->orderByDesc('created_at')
                    ->paginate($length)
                    ->appends(['search','length']);
            }elseif(!$user->bank && $user->admin){
                $list = BankOrder::where('name','like','%'.$search.'%')
                    ->orderByDesc('created_at')
                    ->paginate($length)
                    ->appends(['search','length']);
            }else{
                return redirect()->route('admin.index');
            }
        }else{
            if ($user && $user->bank){
                $list = $user->bank->orders()->paginate(10);
            }elseif($user && !$user->bank && $user->admin){
                $list = BankOrder::orderByDesc('created_at')->paginate(10);
            }else{
                return redirect()->route('admin.index');
            }
        }

        return view('admin.order.list',compact('list','detail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = BankOrder::find($id);
        $user = Auth::user();
        if ($user->admin){
            $banks = $order->banks;
            $detail = $order->details;
            $currencies = [];
        }elseif($user->isbank){
            $banks = [$user->bank];
            $detail = [BankOrderDetail::where('user_id',Auth::user()->id)->first()];
            $currencies = Currency::activelist();
        }else{
            return redirect()->route('order.admin.index');
        }

        return view('admin.order.show',compact('order','banks','detail','currencies'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = BankOrder::find($request->id);
        $order->delete();

        return response()->json(['order' => route('order.admin.index')]);
    }

    protected function doactive(Request $request)
    {
        $order = BankOrder::find($request->id);
        $user = Auth::user();
        BankOrderDetail::create([
            'user_id'=>$user->id,
            'bank_id'=>$user->bank->id,
            'bank_order_id'=>$order->id,
            'bank_branch_id'=>$request->branch_id
        ]);

        return response()->json(['order' => route('order.admin.index')]);
    }

    protected function dopay(Request $request)
    {
        $detail = BankOrderDetail::where(['bank_order_id'=>$request->id,'user_id'=>Auth::user()->id])->first();

        $detail->update([
            'amount'=>$request->amount,
            'currency_id'=>$request->currency_id
        ]);

        return response()->json(['order' => route('order.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = BankOrder::find($request->id);
        $model->update(['status' => 'reject']);
        $model->save();

        return response()->json(['order' => route('order.admin.index')]);
    }
}