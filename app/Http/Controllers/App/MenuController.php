<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu $pages
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $menu = Menu::where('slug',$slug)->first();

        if(isset($menu) && $menu->id==5){
            return view('app.pages.contact', compact('menu'));
        }elseif (isset($menu) && $menu->id==3) {
            $faqs = Faq::activelist();
            return view('app.pages.faq', compact('menu','faqs'));
        }elseif (isset($menu)) {
            return view('app.pages.page', compact('menu'));
        }else {
            return redirect()->to('/');
        }
    }
}