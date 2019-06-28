<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Http\Requests\StoreMenu;
use App\Models\Menu;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Auth::user()->can('manage', Menu::class), 404);

        if (\request()->filled('search') || \request()->has('length')){
            \request()->flash();
            $search = \request('search');
            $length = (!empty(\request('length'))) ? \request('length') : 10;

            if(!empty($search)){
                $list = Menu::whereTranslationLike('name','like','%'.$search.'%')
                    ->orderByDesc('created_at')
                    ->paginate($length)
                    ->appends(['search','length']);
            }else{
                $list = Menu::orderByDesc('created_at')
                    ->paginate($length)
                    ->appends(['search','length']);
            }
        }else {
            $list = Menu::orderByDesc('created_at')->paginate(10);
        }

        return view('admin.menu.list', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->can('manage', Menu::class), 404);

        return view('admin.menu.create', ['menus' => Menu::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenu  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMenu $request)
    {
        $menu = Menu::create($request->all());

        if ($menuId = $request->menu_id) {
            if ($parent = Menu::find($menuId)) {
                $menu = $parent->menus()->create($request->all());
            }
        } else {
            $menu = Menu::create($request->all());
        }

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/menu/'.$menu->id);
            $name = str_slug($menu->name).'-'.random_int('0','999999').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $menu->image = $name;
            $menu->save();

            $indexdestinationPath = public_path('/uploads/menu/' . $menu->id . '/icon');

            $image = new SimpleImage($destinationPath.'/'.$name);
            $image->thumbnail('25', '25');
            $image->toFile($indexdestinationPath,$name);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
//        return redirect()->route('menu.admin.create');
        return redirect()->route('menu.admin.show',$menu->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.menu.show', ['menu' => Menu::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('manage', Menu::class), 404);
        return view('admin.menu.edit', ['menu' => Menu::find($id),'menus' => Menu::all()]);
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
        abort_unless(Auth::user()->can('manage', Menu::class), 404);
        $menu = Menu::find($id);
        $menu->update($request->all());

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/menu/'.$menu->id);
            $indexdestinationPath = public_path('/uploads/menu/' . $menu->id . '/icon');

            @unlink(public_path($destinationPath.'/'.$menu->image));
            @unlink(public_path($indexdestinationPath.'/'.$menu->image));

            $name = str_slug($menu->name).'-'.random_int('0','999999').'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $menu->image = $name;
            $menu->save();

            $image = new SimpleImage($destinationPath.'/'.$name);
            $image->thumbnail('25', '25');
            $image->toFile($indexdestinationPath,$name);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('menu.admin.show',$menu->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        abort_unless(Auth::user()->can('manage', Menu::class), 404);

        $menu = Menu::findOrFail($request->id);

        $destinationPath = public_path('/uploads/menu/'.$menu->id);
        $indexdestinationPath = public_path('/uploads/menu/' . $menu->id . '/icon');

        @unlink(public_path($destinationPath.'/'.$menu->image));
        @unlink(public_path($indexdestinationPath.'/'.$menu->image));

        $menu->delete();

        return response()->json(['menu' => route('menu.admin.index')]);
    }

    protected function doactive(Request $request)
    {
        abort_unless(Auth::user()->can('manage', Menu::class), 404);

        $model = Menu::find($request->id);
        $model->update(['status' => '1']);
        $model->save();

        return response()->json(['menu' => route('menu.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        abort_unless(Auth::user()->can('manage', Menu::class), 404);

        $model = Menu::find($request->id);
        $model->update(['status' => '0']);
        $model->save();

        return response()->json(['menu' => route('menu.admin.index')]);
    }

    public function sort(Sort $request)
    {
        foreach (json_decode($request->order) as $order => $menu) {
            if ($menu = Menu::find($menu->id)) {
                $menu->sort(++$order);
            }
        }
    }
}
