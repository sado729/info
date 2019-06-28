<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Http\Requests\StoreNews;
use App\Models\Category;
use App\Models\CategoryNews;
use App\Models\Gallery;
use App\Models\News;
use App\Models\NewsTags;
use App\Models\Tag;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
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

            $list = News::whereTranslationLike('name','%'.$search.'%')
                ->orderByDesc('created_at')
                ->paginate($length)
                ->appends(['search','length']);
        }else{
            $list = News::orderByDesc('created_at')->paginate(10);
        }

        return view('admin.news.list', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->can('manage', News::class), 404);

        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNews  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNews $request)
    {
        $news = News::create($request->all());

        if ($image = $request->file('file')) {
            $destinationPath = public_path('/uploads/news/'.$news->id);
            $largedestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/large');
            $mediumdestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/medium');
            $littledestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/little');

            foreach($image as $img) {
                $name = str_slug($news->name) . '-' . random_int('0', '999999') . '.' . $img->getClientOriginalExtension();
                $img->move($destinationPath, $name);

                $img = new SimpleImage($destinationPath.'/'.$name);
                $img->thumbnail('500', '500');
                $img->toFile($largedestinationPath,$name);

                $img = new SimpleImage($destinationPath.'/'.$name);
                $img->thumbnail('235', '258');
                $img->toFile($mediumdestinationPath,$name);

                $img = new SimpleImage($destinationPath.'/'.$name);
                $img->thumbnail('155', '170');
                $img->toFile($littledestinationPath,$name);

                if (!empty($img)) {
                    $news->image()->create(['image' => $name, 'status' => 1]);
                }
            }
        }

        return redirect()->route('news.admin.show',$news->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.news.show', ['news' => News::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('manage', News::class), 404);

        $news = News::find($id);

        return view('admin.news.edit', compact('news'));
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
        abort_unless(Auth::user()->can('manage', News::class), 404);
        $news = News::find($id);

        if ($request->hasFile('file')) {
            $image = $request->file('file');

            $destinationPath = public_path('/uploads/news/'.$news->id);
            $largedestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/large');
            $mediumdestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/medium');
            $littledestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/little');
            foreach($image as $img)
            {
                $name = str_slug($news->name) . '-' . random_int('0', '999999') . '.' . $img->getClientOriginalExtension();
                $img->move($destinationPath, $name);

                $img = new SimpleImage($destinationPath.'/'.$name);
                $img->thumbnail('500', '500');
                $img->toFile($largedestinationPath,$name);

                $img = new SimpleImage($destinationPath.'/'.$name);
                $img->thumbnail('235', '258');
                $img->toFile($mediumdestinationPath,$name);

                $img = new SimpleImage($destinationPath.'/'.$name);
                $img->thumbnail('155', '170');
                $img->toFile($littledestinationPath,$name);

                if (!empty($img)) {
                    $news->image()->create(['image' => $name, 'status' => 1]);
                }
            }
        }

        $news->update($request->all());
        return redirect()->route('news.admin.show',$news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $news = News::find($request->id);

        $destinationPath = public_path('/uploads/news/'.$news->id.'/gallery/');
        $largedestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/large');
        $mediumdestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/medium');
        $littledestinationPath = public_path('/uploads/news/'.$news->id.'/gallery/little');

        foreach ($news->image as $gallery){
            @unlink($destinationPath.'/'.$gallery->image);
            @unlink($largedestinationPath.'/'.$gallery->image);
            @unlink($mediumdestinationPath.'/'.$gallery->image);
            @unlink($littledestinationPath.'/'.$gallery->image);
        }

        $news->delete();

        return response()->json(['news' => route('news.admin.index')]);
    }

    public function deleteimg(Request $request)
    {
        $gallery = Gallery::findOrFail($request->id);

        $destinationPath = public_path('/uploads/news/'.$gallery->imageable_id.'/gallery/');
        $largedestinationPath = public_path('/uploads/news/'.$gallery->imageable_id.'/gallery/large');
        $mediumdestinationPath = public_path('/uploads/news/'.$gallery->imageable_id.'/gallery/medium');
        $littledestinationPath = public_path('/uploads/news/'.$gallery->imageable_id.'/gallery/little');

        @unlink($destinationPath.'/'.$gallery->image);
        @unlink($largedestinationPath.'/'.$gallery->image);
        @unlink($mediumdestinationPath.'/'.$gallery->image);
        @unlink($littledestinationPath.'/'.$gallery->image);

        $gallery->delete();

        return response()->json(['response' => 'ok']);
    }

    protected function doactive(Request $request)
    {
        $model = News::find($request->id);
        $model->update(['status' => '1']);
        $model->save();

        return response()->json(['news' => route('news.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = News::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['news' => route('news.admin.index')]);
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
        foreach (json_decode($request->order) as $order => $news) {
            if ($news = News::find($news->id)) {
                $news->sort(++$order);
            }
        }
    }
}
