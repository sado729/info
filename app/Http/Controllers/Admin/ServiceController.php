<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Http\Requests\StoreService;
use App\Http\Requests\UpdateService;
use App\Models\Service;
use App\Models\Gallery;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
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

            $list = Service::whereTranslationLike('name','%'.$search.'%')
                ->orderByDesc('created_at')
                ->paginate($length)
                ->appends(['search','length']);
        }else{
            $list = Service::orderByDesc('created_at')->paginate(10);
        }

        return view('admin.service.list', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->can('manage', Service::class), 404);

        return view('admin.service.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProject  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreService $request)
    {
        $service = Service::create($request->all());

        if ($image = $request->file('file')) {
            $gallerydestinationPath = public_path('/uploads/gallery/'.$service->id);
            $indexdestinationPath = public_path('/uploads/gallery/'.$service->id.'/index');
            $otherdestinationPath = public_path('/uploads/gallery/'.$service->id.'/other');
            $gallerylargedestinationPath = public_path('/uploads/gallery/'.$service->id.'/gallery');
            foreach($image as $img)
            {
                $name = str_slug($service->name).'-'.random_int('0','999999').'.'.$img->getClientOriginalExtension();
                $img->move($gallerydestinationPath, $name);

                $img = new SimpleImage($gallerydestinationPath.'/'.$name);
                $img->thumbnail('1140', '534');
                $img->toFile($gallerylargedestinationPath,$name);

                $image = new SimpleImage($gallerydestinationPath.'/'.$name);
                $image->thumbnail('360', '190');
                $image->toFile($indexdestinationPath,$name);

                $image = new SimpleImage($gallerydestinationPath.'/'.$name);
                $image->thumbnail('285', '203');
                $image->toFile($otherdestinationPath,$name);

                if (!empty($img)) {
                    $service->image()->create(['image' => $name, 'status' => '1', 'type' => '1']);
                }
            }
        }

        if ($image = $request->file('image')) {
            $gallerydestinationPath = public_path('/uploads/gallery/'.$service->id);
            $indexdestinationPath = public_path('/uploads/gallery/'.$service->id.'/index');
            $otherdestinationPath = public_path('/uploads/gallery/'.$service->id.'/other');
            $gallerylargedestinationPath = public_path('/uploads/gallery/'.$service->id.'/gallery');
            foreach($image as $img)
            {
                $name = str_slug($service->name).'-'.random_int('0','999999').'.'.$img->getClientOriginalExtension();
                $img->move($gallerydestinationPath, $name);

                $img = new SimpleImage($gallerydestinationPath.'/'.$name);
                $img->thumbnail('1140', '534');
                $img->toFile($gallerylargedestinationPath,$name);

                $image = new SimpleImage($gallerydestinationPath.'/'.$name);
                $image->thumbnail('360', '190');
                $image->toFile($indexdestinationPath,$name);

                $image = new SimpleImage($gallerydestinationPath.'/'.$name);
                $image->thumbnail('285', '203');
                $image->toFile($otherdestinationPath,$name);

                if (!empty($img)) {
                    $service->image()->create(['image' => $name, 'status' => '1', 'type' => '2']);
                }
            }
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('service.admin.show',$service->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        $gallery = $service->image;
        return view('admin.service.show', compact('service','gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('manage', Service::class), 404);

        $service = Service::where('id',$id)->first();

        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateService $request,$id)
    {
        abort_unless(Auth::user()->can('manage', Service::class), 404);
        $service = Service::where('id',$id)->first();

        $service->update($request->all());

        if ($image = $request->file('file')) {
            $gallerydestinationPath = public_path('/uploads/gallery/'.$service->id);
            $indexdestinationPath = public_path('/uploads/gallery/'.$service->id.'/index');
            $otherdestinationPath = public_path('/uploads/gallery/'.$service->id.'/other');
            $gallerylargedestinationPath = public_path('/uploads/gallery/'.$service->id.'/gallery');
            foreach($image as $img)
            {
                $name = str_slug($service->name).'-'.random_int('0','999999').'.'.$img->getClientOriginalExtension();
                $img->move($gallerydestinationPath, $name);

                $img = new SimpleImage($gallerydestinationPath.'/'.$name);
                $img->thumbnail('1140', '534');
                $img->toFile($gallerylargedestinationPath,$name);

                $image = new SimpleImage($gallerydestinationPath.'/'.$name);
                $image->thumbnail('360', '190');
                $image->toFile($indexdestinationPath,$name);

                $image = new SimpleImage($gallerydestinationPath.'/'.$name);
                $image->thumbnail('285', '203');
                $image->toFile($otherdestinationPath,$name);

                if (!empty($img)) {
                    $service->image()->create(['image' => $name, 'status' => '1', 'type' => '1']);
                }
            }
        }

        if ($image = $request->file('image')) {
            $gallerydestinationPath = public_path('/uploads/gallery/'.$service->id);
            $indexdestinationPath = public_path('/uploads/gallery/'.$service->id.'/index');
            $otherdestinationPath = public_path('/uploads/gallery/'.$service->id.'/other');
            $gallerylargedestinationPath = public_path('/uploads/gallery/'.$service->id.'/gallery');
            foreach($image as $img)
            {
                $name = str_slug($service->name).'-'.random_int('0','999999').'.'.$img->getClientOriginalExtension();
                $img->move($gallerydestinationPath, $name);

                $img = new SimpleImage($gallerydestinationPath.'/'.$name);
                $img->thumbnail('1140', '534');
                $img->toFile($gallerylargedestinationPath,$name);

                $image = new SimpleImage($gallerydestinationPath.'/'.$name);
                $image->thumbnail('360', '190');
                $image->toFile($indexdestinationPath,$name);

                $image = new SimpleImage($gallerydestinationPath.'/'.$name);
                $image->thumbnail('285', '203');
                $image->toFile($otherdestinationPath,$name);

                if (!empty($img)) {
                    $service->image()->create(['image' => $name, 'status' => '1', 'type' => '2']);
                }
            }
        }

        Alert::success('Təbriklər!', 'Əməliyyat uğurla həyata keçirildi!');
        return redirect()->route('service.admin.show',$service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $service = Service::find($request->id);

        $gallerydestinationPath = public_path('/uploads/gallery/'.$service->id);
        $indexdestinationPath = public_path('/uploads/gallery/'.$service->id.'/index');
        $otherdestinationPath = public_path('/uploads/gallery/'.$service->id.'/other');
        $gallerylargedestinationPath = public_path('/uploads/gallery/'.$service->id.'/gallery');

        @unlink($gallerydestinationPath.'/'.$service->image);
        @unlink($indexdestinationPath.'/'.$service->image);
        @unlink($otherdestinationPath.'/'.$service->image);
        @unlink($gallerylargedestinationPath.'/'.$service->image);

        $service->delete();
        return response()->json(['service' => route('service.admin.index')]);
    }

    public function deleteimg(Request $request)
    {
        $gallery = Gallery::findOrFail($request->id);

        $gallerydestinationPath = public_path('/uploads/gallery/'.$gallery->imageable_id);
        $indexdestinationPath = public_path('/uploads/gallery/'.$gallery->imageable_id.'/index');
        $otherdestinationPath = public_path('/uploads/gallery/'.$gallery->imageable_id.'/other');
        $gallerylargedestinationPath = public_path('/uploads/gallery/'.$gallery->imageable_id.'/gallery');


        @unlink($gallerydestinationPath.'/'.$gallery->image);
        @unlink($indexdestinationPath.'/'.$gallery->image);
        @unlink($otherdestinationPath.'/'.$gallery->image);
        @unlink($gallerylargedestinationPath.'/'.$gallery->image);

        $gallery->delete();

        return response()->json(['response' => 'ok']);
    }

    protected function doactive(Request $request)
    {
        $model = Service::find($request->id);
        $model->update(['status' => '1']);
        $model->save();

        return response()->json(['service' => route('service.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = Service::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['service' => route('service.admin.index')]);
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
        foreach (json_decode($request->order) as $order => $service) {
            if ($service = Service::find($service->id)) {
                $service->sort(++$order);
            }
        }
    }
}
