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

Route::group(['namespace' => 'Admin'], function () {
    Route::group(['middleware' => ['auth', 'admin', 'minify']], function () {

        Route::get('index', 'IndexController@index')->name('admin.index');
        Route::get('/package', 'PackageController@index')->name('admin.package');
        Route::get('/transfer', 'TransferController@index')->name('admin.transfer');
        Route::get('/paying', 'PayingController@index')->name('admin.paying');
        //Network
        Route::get('/addNewMember', 'AddNewMemberController@index')->name('admin.network.addNewMember');
        Route::get('/genealogyTree', 'GenealogyTreeController@index')->name('admin.network.genealogyTree');
        Route::get('/referrals', 'ReferralsController@index')->name('admin.network.referrals');


        Route::view('/checkout', 'admin.network.checkout')->name('admin.network.checkout');
        Route::view('/review', 'admin.network.review')->name('admin.network.review');
        Route::view('/enrolment', 'admin.network.enrolment')->name('admin.network.enrolment');

        //Support
        Route::get('/supportRequest', 'SupportRequestController@index')->name('admin.support.supportRequest');
        Route::get('/mySupport', 'MySupportController@index')->name('admin.support.mySupport');
        //Promotion Tools
        Route::view('/promotionalBanners', 'admin.promotion.promotionalBanners')->name('admin.promotion.promotionalBanners');
        Route::view('/referralLink', 'admin.promotion.referralLink')->name('admin.promotion.referralLink');
        //My Profile
        Route::get('/userProfile', 'UserProfileController@index')->name('admin.account.userProfile');
        Route::get('/editProfile', 'UserEditProfileController@index')->name('admin.account.editProfile');
        Route::view('/editProfileImage', 'admin.account.editProfileImage')->name('admin.account.editProfileImage');

//      Route::get('statistic', 'StatisticController@index')->name('admin.statistic');
        Route::get('statistic/{id}/', 'StatisticController@show')->name('admin.statistic');
        Route::post('statistic/{id}/', 'StatisticController@show')->name('admin.statistic');

        Route::name('information.admin.')->prefix('information')->group(function () {
            Route::get('/edit', 'InformationController@edit')->name('edit');
            Route::post('/update', 'InformationController@update')->name('update');
        });

        Route::name('balance.')->prefix('balance')->group(function () {
            Route::get('/', 'BalanceController@index')->name('index');
            Route::get('/create', 'BalanceController@create')->name('create');
            Route::post('/store', 'BalanceController@store')->name('store');
        });

        Route::name('menu.admin.')->prefix('menu')->group(function () {
            Route::get('/', 'MenuController@index')->name('index');
            Route::get('/create', 'MenuController@create')->name('create');
            Route::post('/store', 'MenuController@store')->name('store');
            Route::get('/{id}/edit', 'MenuController@edit')->name('edit');
            Route::delete('/{id}/deleteimg', 'MenuController@deleteimg')->name('deleteimg');
            Route::get('/{id}/show', 'MenuController@show')->name('show');
            Route::post('/{id}/update', 'MenuController@update')->name('update');
            Route::delete('/delete', 'MenuController@destroy')->name('delete');
            Route::post('/doactive', 'MenuController@doactive')->name('active');
            Route::post('/dopassive', 'MenuController@dopassive')->name('passive');
            Route::patch('sort', 'MenuController@sort')->name('sort');
        });
        
        Route::name('news.admin.')->prefix('news')->group(function () {
            Route::get('/', 'NewsController@index')->name('index');
            Route::get('/create', 'NewsController@create')->name('create');
            Route::post('/store', 'NewsController@store')->name('store');
            Route::get('/{id}/edit', 'NewsController@edit')->name('edit');
            Route::delete('/{id}/deleteimg', 'NewsController@deleteimg')->name('deleteimg');
            Route::get('/{id}/show', 'NewsController@show')->name('show');
            Route::post('/{id}/update', 'NewsController@update')->name('update');
            Route::delete('/delete', 'NewsController@destroy')->name('delete');
            Route::post('/doactive', 'NewsController@doactive')->name('active');
            Route::post('/dopassive', 'NewsController@dopassive')->name('passive');
            Route::patch('sort', 'NewsController@sort')->name('sort');
        });
        
        Route::name('partner.admin.')->prefix('partner')->group(function () {
            Route::get('/', 'PartnerController@index')->name('index');
            Route::get('/create', 'PartnerController@create')->name('create');
            Route::post('/store', 'PartnerController@store')->name('store');
            Route::get('/{id}/edit', 'PartnerController@edit')->name('edit');
            Route::delete('/{id}/deleteimg', 'PartnerController@deleteimg')->name('deleteimg');
            Route::get('/{id}/show', 'PartnerController@show')->name('show');
            Route::post('/{id}/update', 'PartnerController@update')->name('update');
            Route::delete('/delete', 'PartnerController@destroy')->name('delete');
            Route::post('/doactive', 'PartnerController@doactive')->name('active');
            Route::post('/dopassive', 'PartnerController@dopassive')->name('passive');
            Route::patch('sort', 'PartnerController@sort')->name('sort');
        });
        
        Route::name('order.admin.')->prefix('order')->group(function () {
            Route::get('/', 'OrderController@index')->name('index');
            Route::get('/{id}/show', 'OrderController@show')->name('show');
            Route::post('/{id}/update', 'PartnerController@update')->name('update');
            Route::post('/doactive', 'OrderController@doactive')->name('active');
            Route::post('/dopay', 'OrderController@dopay')->name('pay');
            Route::post('/dopassive', 'OrderController@dopassive')->name('passive');
            Route::delete('/delete', 'OrderController@destroy')->name('delete');
        });

        Route::name('faq.admin.')->prefix('faq')->group(function () {
            Route::get('/', 'FaqController@index')->name('index');
            Route::get('/create', 'FaqController@create')->name('create');
            Route::post('/store', 'FaqController@store')->name('store');
            Route::get('/{id}/edit', 'FaqController@edit')->name('edit');
            Route::get('/{id}/show', 'FaqController@show')->name('show');
            Route::post('/{id}/update', 'FaqController@update')->name('update');
            Route::delete('/delete', 'FaqController@destroy')->name('delete');
            Route::post('/doactive', 'FaqController@doactive')->name('active');
            Route::post('/dopassive', 'FaqController@dopassive')->name('passive');
            Route::patch('sort', 'FaqController@sort')->name('sort');
        });
        
        Route::name('service.admin.')->prefix('service')->group(function () {
            Route::get('/', 'ServiceController@index')->name('index');
            Route::get('/create', 'ServiceController@create')->name('create');
            Route::post('/store', 'ServiceController@store')->name('store');
            Route::get('/{id}/edit', 'ServiceController@edit')->name('edit');
            Route::get('/{id}/show', 'ServiceController@show')->name('show');
            Route::post('/{id}/update', 'ServiceController@update')->name('update');
            Route::delete('/delete', 'ServiceController@destroy')->name('delete');
            Route::post('/doactive', 'ServiceController@doactive')->name('active');
            Route::post('/dopassive', 'ServiceController@dopassive')->name('passive');
            Route::patch('sort', 'ServiceController@sort')->name('sort');
        });

        Route::name('product.admin.')->prefix('product')->group(function () {
            Route::match(['get','post'],'/', 'ProductController@index')->name('index');
            Route::get('/create', 'ProductController@create')->name('create');
            Route::post('/store', 'ProductController@store')->name('store');
            Route::get('/{id}/edit', 'ProductController@edit')->name('edit');
            Route::get('/{id}/show', 'ProductController@show')->name('show');
            Route::post('/{id}/update', 'ProductController@update')->name('update');
            Route::delete('/delete', 'ProductController@destroy')->name('delete');
            Route::delete('/{id}/deleteimg', 'ProductController@deleteimg')->name('deleteimg');
            Route::post('/doactive', 'ProductController@doactive')->name('active');
            Route::post('/dopassive', 'ProductController@dopassive')->name('passive');
            Route::patch('sort', 'ProductController@sort')->name('sort');
        });

        Route::name('why.admin.')->prefix('why')->group(function () {
            Route::match(['get','post'],'/', 'WhyController@index')->name('index');
            Route::get('/create', 'WhyController@create')->name('create');
            Route::post('/store', 'WhyController@store')->name('store');
            Route::get('/{id}/edit', 'WhyController@edit')->name('edit');
            Route::get('/{id}/show', 'WhyController@show')->name('show');
            Route::post('/{id}/update', 'WhyController@update')->name('update');
            Route::delete('/delete', 'WhyController@destroy')->name('delete');
            Route::delete('/{id}/deleteimg', 'WhyController@deleteimg')->name('deleteimg');
            Route::post('/doactive', 'WhyController@doactive')->name('active');
            Route::post('/dopassive', 'WhyController@dopassive')->name('passive');
            Route::patch('sort', 'WhyController@sort')->name('sort');
        });
        
        Route::name('banner.admin.')->prefix('banner')->group(function () {
            Route::match(['get','post'],'/', 'BannerController@index')->name('index');
            Route::get('/create', 'BannerController@create')->name('create');
            Route::post('/store', 'BannerController@store')->name('store');
            Route::get('/{id}/edit', 'BannerController@edit')->name('edit');
            Route::get('/{id}/show', 'BannerController@show')->name('show');
            Route::post('/{id}/update', 'BannerController@update')->name('update');
            Route::delete('/delete', 'BannerController@destroy')->name('delete');
            Route::delete('/{id}/deleteimg', 'BannerController@deleteimg')->name('deleteimg');
            Route::post('/doactive', 'BannerController@doactive')->name('active');
            Route::post('/dopassive', 'BannerController@dopassive')->name('passive');
            Route::patch('sort', 'BannerController@sort')->name('sort');
        });

//        Route::name('gallery.admin.')->prefix('gallery')->group(function () {
//            Route::match(['get','post'],'/', 'GalleryController@index')->name('index');
//            Route::get('/create', 'GalleryController@create')->name('create');
//            Route::post('/store', 'GalleryController@store')->name('store');
//            Route::get('/{id}/edit', 'GalleryController@edit')->name('edit');
//            Route::get('/{id}/show', 'GalleryController@show')->name('show');
//            Route::post('/{id}/update', 'GalleryController@update')->name('update');
//            Route::delete('/delete', 'GalleryController@destroy')->name('delete');
//            Route::delete('/{id}/deleteimg', 'GalleryController@deleteimg')->name('deleteimg');
//            Route::post('/doactive', 'GalleryController@doactive')->name('active');
//            Route::post('/dopassive', 'GalleryController@dopassive')->name('passive');
//        });
        
        Route::name('user.admin.')->prefix('user')->group(function () {
            Route::match(['get','post'],'/', 'UsersController@index')->name('index');
            Route::get('/create', 'UsersController@create')->name('create');
            Route::post('/store', 'UsersController@store')->name('store');
            Route::get('/{id}/edit', 'UsersController@edit')->name('edit');
            Route::get('/{id}/show', 'UsersController@show')->name('show');
            Route::post('/{id}/update', 'UsersController@update')->name('update');
            Route::delete('/delete', 'UsersController@destroy')->name('delete');
            Route::post('/doactive', 'UsersController@doactive')->name('active');
            Route::post('/dopassive', 'UsersController@dopassive')->name('passive');
        });

        Route::prefix('laravel-filemanager')->group(function () {
            Route::get('/', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
            Route::post('/upload','\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
        });

    });

});