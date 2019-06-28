<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Models\Banner;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->filled('search') || $request->has('length')){
            $request->flash();
            $search = $request->get('search');
            $length = (!empty($request->get('length'))) ? $request->get('length') : 10;

            $list = Banner::where('name','like','%'.$search.'%')
                ->orderByDesc('created_at')
                ->paginate($length)
                ->appends(['search','length']);
        }else{
            $list = Banner::orderByDesc('created_at')->paginate(10);
        }

        return view('admin.banner.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->can('manage', Banner::class), 404);

        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBanner  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $banner = Banner::create($request->all());

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/banner/'.$banner->id.'/');
            $largedestinationPath = public_path('/uploads/banner/'.$banner->id.'/large');

            $name = str_slug($banner->name) . '-' . random_int('0', '999999') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $image = new SimpleImage($destinationPath.'/'.$name);
            $image->thumbnail('170', '630');
            $image->toFile($largedestinationPath,$name);

            $banner->update(['image' => $name]);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('banner.admin.show',$banner->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::find($id);

        return view('admin.banner.show',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('manage', Banner::class), 404);

        $banner = Banner::find($id);

        return view('admin.banner.edit', compact('banner'));
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
        abort_unless(Auth::user()->can('manage', Banner::class), 404);

        $banner = Banner::find($id);
        $banner->update($request->all());

        if ($image = $request->file('image')){
            $destinationPath = public_path('/uploads/banner/'.$banner->id.'/');
            $largedestinationPath = public_path('/uploads/banner/'.$banner->id.'/large');

            @unlink($destinationPath.'/'.$banner->image);
            @unlink($largedestinationPath.'/'.$banner->image);

            $name = str_slug($banner->name) . '-' . random_int('0', '999999') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $name);

            $image = new SimpleImage($destinationPath.'/'.$name);
            $image->thumbnail('170', '630');
            $image->toFile($largedestinationPath,$name);

            $banner->update(['image' => $name]);
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('banner.admin.show',$banner->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $banner = Banner::find($request->id);

        $destinationPath = public_path('/uploads/banner/'.$banner->id.'/');
        $largedestinationPath = public_path('/uploads/banner/'.$banner->id.'/large');

        @unlink($destinationPath.'/'.$banner->image);
        @unlink($largedestinationPath.'/'.$banner->image);

        $banner->delete();

        return response()->json(['banner' => route('banner.admin.index')]);
    }

    protected function doactive(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->update(['status' => '1']);
        $banner->save();

        return response()->json(['banner' => route('banner.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = Banner::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['banner' => route('banner.admin.index')]);
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
        foreach (json_decode($request->order) as $order => $banner) {
            if ($banner = Banner::find($banner->id)) {
                $banner->sort(++$order);
            }
        }
    }
}