<?php

namespace App\Http\Controllers;

use App\Models\Product;

class SitemapController extends Controller
{
    /**
     * Generate the sitemap.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('app.sitemap', ['posts' => Product::all()])
                         ->header('Content-Type', 'text/xml');
    }
}
