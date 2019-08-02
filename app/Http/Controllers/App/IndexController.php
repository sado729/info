<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller as Controller;
use App\Models\News;

class IndexController extends Controller
{
    protected function index()
    {
        $news = News::listActive();

        return view('app.index',compact('news'));
    }
}
