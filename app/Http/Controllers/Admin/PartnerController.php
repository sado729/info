<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartner;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\request()->filled('search') || \request()->has('length')){
            \request()->flash();
            $search = \request('search');
            $length = (!empty(\request('length'))) ? \request('length') : 10;

            $list = Partner::where('name','like','%'.$search.'%')
                ->orderByDesc('id')
                ->paginate($length);
        }else{
            $list = Partner::orderByDesc('created_at')->paginate(10);
        }

        return view('admin.partner.list', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->can('manage', Partner::class), 404);

        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePartner  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePartner $request)
    {
        $partner = Partner::create($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($request->name).'-'.random_int('0','999999').'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/partners');
            $image->move($destinationPath, $name);

            $partner->image = $name;
            $partner->save();
        }

        return redirect()->route('partner.admin.show',$partner->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.partner.show', ['partner' => Partner::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('manage', partner::class), 404);
        return view('admin.partner.edit', ['partner' => Partner::find($id)]);
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
        abort_unless(Auth::user()->can('manage', Partner::class), 404);

        $partner = Partner::find($id);
        $partner->update($request->all());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = str_slug($request->name).'-'.random_int('0','999999').'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/partners');
            $image->move($destinationPath, $name);

            $partner->image = $name;
            $partner->save();
        }

        return redirect()->route('partner.admin.show',$partner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $partner = Partner::findOrFail($request->id);
        $partner->delete();

        return response()->json(['partner' => route('partner.admin.index')]);
    }

    protected function doactive(Request $request)
    {
        $model = Partner::find($request->id);
        $model->update(['status' => '1']);
        $model->save();

        return response()->json(['partner' => route('partner.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = Partner::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['partner' => route('partner.admin.index')]);
    }
}
