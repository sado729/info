<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Models\Bank;
use App\Models\Gallery;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bank = Bank::find(Auth::user()->bank_id);
        if ($request->filled('search') || $request->has('length')){
            $request->flash();
            $search = $request->get('search');
            $length = (!empty($request->get('length'))) ? $request->get('length') : 10;

            if (!empty($bank)){
                $list = Bank::find($bank['bank_id']);
            }else{
                $list = Bank::where('name','like','%'.$search.'%')
                    ->orderByDesc('created_at')
                    ->paginate($length)
                    ->appends(['search','length']);
            }
        }else{
            if (!empty($bank)){
                $list = Bank::find($bank['bank_id']);
            }else{
                $list = Bank::orderByDesc('created_at')->paginate(10);
            }
        }

        return view('admin.bank.list',compact('bank','list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->can('manage', Bank::class), 404);
        $bank = Bank::find(Auth::user()->bank_id);
        if (!empty($bank)){
            return redirect()->route('bank.admin.index');
        }

        return view('admin.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBank  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $bank = Bank::create($request->all());

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/bank/'.$bank->id.'/');
            $largedestinationPath = public_path('/uploads/bank/'.$bank->id.'/large');

            $name = str_slug($bank->name) . '-' . random_int('0', '999999') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $image = new SimpleImage($destinationPath.'/'.$name);
            $image->thumbnail('168', '125');
            $image->toFile($largedestinationPath,$name);

            $bank->update(['image' => $name]);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('bank.admin.show',$bank->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank1 = Bank::find(Auth::user()->bank_id);
        $bank = Bank::find($id);

        if (!$bank || ($bank1 && $bank1 != $bank)){
            return redirect()->route('product.admin.index');
        }

        return view('admin.bank.show',compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('manage', Bank::class), 404);

        $bank = Bank::find($id);

        $bank1 = Bank::find(Auth::user()->bank_id);

        if ($bank!=$bank1 && $bank1){
            return redirect()->route('bank.admin.index');
        }

        return view('admin.bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        abort_unless(Auth::user()->can('manage', Bank::class), 404);

        $bank = Bank::find($id);
        $bank->update($request->all());

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/bank/'.$bank->id.'/');
            $largedestinationPath = public_path('/uploads/bank/'.$bank->id.'/large');

            @unlink($destinationPath.'/'.$bank->image);
            @unlink($largedestinationPath.'/'.$bank->image);

            $name = str_slug($bank->name) . '-' . random_int('0', '999999') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $image = new SimpleImage($destinationPath.'/'.$name);
            $image->thumbnail('168', '125');
            $image->toFile($largedestinationPath,$name);

            $bank->update(['image' => $name]);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('bank.admin.show',$bank->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bank = Bank::find(Auth::user()->bank_id);
        if (!empty($bank)){
            return redirect()->route('bank.admin.index');
        }
        $bank = Bank::find($request->id);

        $destinationPath = public_path('/uploads/bank/'.$bank->id.'/');
        $largedestinationPath = public_path('/uploads/bank/'.$bank->id.'/large');

        @unlink($destinationPath.'/'.$bank->image);
        @unlink($largedestinationPath.'/'.$bank->image);

        $bank->delete();

        return response()->json(['bank' => route('bank.admin.index')]);
    }

    protected function doactive(Request $request)
    {
        $bank = Bank::find(Auth::user()->bank_id);
        if (!empty($bank)){
            return redirect()->route('bank.admin.index');
        }
        $bank = Bank::find($request->id);
        $bank->update(['status' => '1']);
        $bank->save();

        return response()->json(['bank' => route('bank.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $bank = Bank::find(Auth::user()->bank_id);
        if (!empty($bank)){
            return redirect()->route('bank.admin.index');
        }
        $model = Bank::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['bank' => route('bank.admin.index')]);
    }

    /**
     * Sort menus.
     *
     * @param \App\Http\Requests\Sort $request
     *
     * @return void
     */
    public function sort(Sort $request)
    {
        foreach (json_decode($request->order) as $order => $bank) {
            if ($bank = Bank::find($bank->id)) {
                $bank->sort(++$order);
            }
        }
    }
}