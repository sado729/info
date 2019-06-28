<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sort;
use App\Models\Gallery;
use App\Models\Faq;
use claviska\SimpleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
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

            $list = Faq::where('question','like','%'.$search.'%')
                ->orderByDesc('created_at')
                ->paginate($length)
                ->appends(['search','length']);
        }else{
            $list = Faq::orderByDesc('created_at')->paginate(10);
        }

        return view('admin.faq.list', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->can('manage', Faq::class), 404);
    // auth user yeni sen can('manage) yeni bacarirsan faq modeli yeni yeni senin faq modelinde icazen varsa demekdi
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFaq  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $faq = Faq::create($request->all());

        return redirect()->route('faq.admin.show',$faq->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.faq.show', ['faq' => Faq::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('manage', Faq::class), 404);

        $faq = Faq::find($id);

        return view('admin.faq.edit', compact('faq'));
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
        abort_unless(Auth::user()->can('manage', Faq::class), 404);
        $faq = Faq::find($id);
        $faq->update($request->all());

        return redirect()->route('faq.admin.show',$faq->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $faq = Faq::find($request->id);
        $faq->delete();

        return response()->json(['faq' => route('faq.admin.index')]);
    }

    protected function doactive(Request $request)
    {
        $model = Faq::find($request->id);
        $model->update(['status' => '1']);
        $model->save();

        return response()->json(['faq' => route('faq.admin.index')]);
    }

    protected function dopassive(Request $request)
    {
        $model = Faq::find($request->id);
        $model->update(['status' => '0']);
        $model->save();
        return response()->json(['faq' => route('faq.admin.index')]);
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
        foreach (json_decode($request->order) as $order => $faq) {
            if ($faq = Faq::find($faq->id)) {
                $faq->sort(++$order);
            }
        }
    }
}
