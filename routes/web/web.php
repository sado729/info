<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['tracker','app'/*, 'minify'*/],'namespace' => 'App'], function () {
    Route::get('sitemap.xml', 'SitemapController@index');
    Route::get('/','IndexController@index')->name('index');
    Route::get('/ana-sehife','IndexController@index');

    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

    Route::name('news.')->prefix('bloq')->group(function () {
        Route::get('/', 'NewsController@all')->name('all');
        Route::post('/get', 'NewsController@get')->name('get');
        Route::post('/type', 'NewsController@type')->name('type');
        Route::get('/{slug}', 'NewsController@show')->name('show');
    });

    Route::get('/banklar','BankController@all')->name('bank.all');
    Route::get('/bank/{slug}','BankController@show')->name('bank.show');

    Route::get('/tag/{tag}','BankController@tag')->name('bank.tag');

    Route::post('add_order', 'OrderController@store')->name('add_order');
    Route::post('/form-send', 'ContactController@send')->name('form_send');

    Route::get('{slug}', 'MenuController@show')->name('menu.show');
});