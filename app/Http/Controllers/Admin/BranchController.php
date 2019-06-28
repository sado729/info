<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\Gallery;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BranchController extends Controller
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

            $list = Branch::where('name','like','%'.$search.'%');
            if (!empty($bank)){
                $list->where('bank_id',$bank->id);
            }
            $list->orderByDesc('created_at')
                ->paginate($length)
                ->appends(['search','length']);
        }else{
            if (!empty($bank)){
                $list = Branch::where('bank_id',$bank->id)->get();
            }else{
                $list = Branch::orderByDesc('created_at')->paginate(10);
            }
        }

        return view('admin.branch.list', compact('bank','list'));
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

        return view('admin.branch.create',compact('banks','bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranch  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $branch = Branch::create($request->all());

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('branch.admin.show',$branch->id);
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
        $branch = Branch::find($id);

        if (!$branch || ($bank && $branch->bank->id != $bank->id)){
            return redirect()->route('product.admin.index');
        }

        return view('admin.branch.show',compact('branch'));
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

        $branch = Branch::find($id);
        $banks = Bank::activelist();
        $bank = Bank::find(Auth::user()->bank_id);
        if (!$branch || ($bank && $bank->id!=$branch->bank_id)){
            return redirect()->route('branch.admin.index');
        }

        return view('admin.branch.edit', compact('branch','banks','bank'));
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

        $branch = Branch::find($id);
        $branch->update($request->all());

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('branch.admin.show',$branch->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $branch = Branch::find($request->id);
        $branch->delete();

        return response()->json(['branch' => route('branch.admin.index')]);
    }

    protected function doactive(Request $request)
    {
        $branch = Branch::find($request->id);
        $branch->update(['status' => '1']);
        $branch->save();

        return response()->json(['branch' => route('branch.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = Branch::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['branch' => route('branch.admin.index')]);
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
        foreach (json_decode($request->order) as $order => $branch) {
            if ($branch = Branch::find($branch->id)) {
                $branch->sort(++$order);
            }
        }
    }
}