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

Route::group(['middleware' => ['tracker','app'/*, 'minify'*/],'namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@login_form')->name('login');
    Route::post('login', [
        'uses'          => 'LoginController@login',
        'middleware'    => 'checkstatus',
    ]);
    Route::get('register', 'RegisterController@register_form')->name('register');
    Route::post('register', 'RegisterController@register');
    Route::get('forgot', 'ForgotPasswordController@forgot')->name('forgot');
    Route::name('password.')->prefix('password')->group(function () {
        Route::get('/reset', 'ForgotPasswordController@showLinkRequestForm')->name('request');
        Route::post('/email', 'ForgotPasswordController@sendResetLinkEmail')->name('email');
        Route::get('/reset/{token}', 'ResetPasswordController@showResetForm')->name('reset');
        Route::post('/reset', 'ResetPasswordController@reset');
    });
    Route::get('logout', 'LoginController@logout')->name('logout');
});