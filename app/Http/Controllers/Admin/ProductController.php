<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Models\Bank;
use App\Models\BankProduct;
use App\Models\Gallery;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
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

            $list = BankProduct::where('name','like','%'.$search.'%');
            if (!empty($bank)){
                $list->where('bank_id',$bank->id);
            }
            $list->orderByDesc('created_at')
                ->paginate($length)
                ->appends(['search','length']);
        }else{
            if (!empty($bank)){
                $list = BankProduct::where('bank_id',$bank->id)->get();
            }else{
                $list = BankProduct::orderByDesc('created_at')->paginate(10);
            }
        }

        return view('admin.product.list', compact('bank','list'));
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
        $banks = Bank::activelist();

        return view('admin.product.create',compact('banks','bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBankProduct  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $product = BankProduct::create($request->all());

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/product/'.$product->id.'/');
            $largedestinationPath = public_path('/uploads/product/'.$product->id.'/large');

            $name = str_slug($product->name) . '-' . random_int('0', '999999') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $image = new SimpleImage($destinationPath.'/'.$name);
            $image->thumbnail('256', '186');
            $image->toFile($largedestinationPath,$name);

            $product->update(['image' => $name]);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('product.admin.show',$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::find(Auth::user()->bank_id);
        $product = BankProduct::find($id);

        if (!$product || ($bank && $product->bank->id != $bank->id)){
            return redirect()->route('product.admin.index');
        }
        return view('admin.product.show', compact('product'));
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

        $product = BankProduct::find($id);
        if (!$product){ return redirect()->route('product.admin.index');}
        $banks = Bank::activelist();
        $bank = Bank::find(Auth::user()->bank_id);

        if ($bank && $bank->id!=$product->bank_id){
            return redirect()->route('product.admin.index');
        }

        return view('admin.product.edit', compact('product','banks','bank'));
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

        $product = BankProduct::find($id);
        $product->update($request->all());

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/product/'.$product->id.'/');
            $largedestinationPath = public_path('/uploads/product/'.$product->id.'/large');

            $name = str_slug($product->name) . '-' . random_int('0', '999999') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $image = new SimpleImage($destinationPath.'/'.$name);
            $image->thumbnail('256', '186');
            $image->toFile($largedestinationPath,$name);

            $product->update(['image' => $name]);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('product.admin.show',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = BankProduct::find($request->id);

        $destinationPath = public_path('/uploads/product/'.$product->id.'/');
        $largedestinationPath = public_path('/uploads/product/'.$product->id.'/large');

        @unlink($destinationPath.'/'.$product->image);
        @unlink($largedestinationPath.'/'.$product->image);

        $product->delete();

        return response()->json(['product' => route('product.admin.index')]);
    }

    public function deleteimg(Request $request)
    {
        $gallery = Gallery::findOrFail($request->id);

        $destinationPath = public_path('/uploads/product/'.$gallery->imageable_id.'/');
        $largedestinationPath = public_path('/uploads/product/'.$gallery->imageable_id.'/large');

        @unlink($destinationPath.'/'.$gallery->image);
        @unlink($largedestinationPath.'/'.$gallery->image);

        $gallery->delete();

        return response()->json(['response' => 'ok']);
    }

    protected function doactive(Request $request)
    {
        $product = BankProduct::find($request->id);
        $product->update(['status' => '1']);
        $product->save();

        return response()->json(['product' => route('product.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = BankProduct::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['product' => route('product.admin.index')]);
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
        foreach (json_decode($request->order) as $order => $product) {
            if ($product = BankProduct::find($product->id)) {
                $product->sort(++$order);
            }
        }
    }
}