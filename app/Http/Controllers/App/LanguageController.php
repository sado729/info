<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLang(Request $request, $lang)
    {
        if (array_key_exists($lang, Config::get('laravellocalization.supportedLocales'))) {
            Session::put('applocale', $lang);
        }

        return $request->url
            ? redirect()->to($request->url)
            : back();
    }
}
