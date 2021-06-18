<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::namespace('Kurban')->group(function () {
    Route::get('/', 'DefaultController@index')->name('dashboard');
    Route::prefix('buyukbas')->group(function () {
        //BLOG
        // Route::post('/buyukbas/sortable', 'BlogController@sortable')->name('blog.Sortable');
        Route::get('/', 'BuyukbasController@index')->name('buyukbas');
        Route::get('/kesilmis', 'BuyukbasController@kesilmis')->name('buyukbas.kesilmis');
        Route::get('/kesilmemis', 'BuyukbasController@kesilmemis')->name('buyukbas.kesilmemis');
        Route::get('/rapor', 'BuyukbasController@rapor')->name('buyukbas.rapor');
        Route::get('/detail/{id}', 'BuyukbasController@detail')->name('buyukbas.detail');
        Route::post('/ajax', 'BuyukbasController@ajax')->name('buyukbas.ajax');
        Route::resource('buyukbas', 'BuyukbasController');

        //PAGE
        //Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
        //Route::resource('page', 'PageController');
    });
    Route::prefix('kucukbas')->group(function () {
        //BLOG
        // Route::post('/buyukbas/sortable', 'BlogController@sortable')->name('blog.Sortable');
        Route::get('/', 'KucukbasController@index')->name('kucukbas');
        Route::get('/kesilmis', 'KucukbasController@kesilmis')->name('kucukbas.kesilmis');
        Route::get('/kesilmemis', 'KucukbasController@kesilmemis')->name('kucukbas.kesilmemis');
        Route::get('/rapor', 'KucukbasController@rapor')->name('kucukbas.rapor');
        Route::get('/detail/{id}', 'KucukbasController@detail')->name('kucukbas.detail');
        Route::resource('kucukbas', 'KucukbasController');

        //PAGE
        //Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
        //Route::resource('page', 'PageController');
    });
});