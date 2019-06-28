<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected function all($slug,$slug1)
    {
        $person = Product::whereHas('menu', function ($query) use ($slug1){
                    $query->whereTranslation('slug', $slug1 ?: $slug);
                })->paginate(12);
        $menu = Menu::whereTranslation('slug', $slug1 ?: $slug)->first();

        return view('app.pages.product',compact('person','menu'));
    }
}
