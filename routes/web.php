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
use App\Http\Controllers\Kurban\BuyukbasController;
use App\Http\Controllers\Kurban\KameraController;

Route::namespace('Kurban')->group(function () {
    Route::get('/', 'DefaultController@index')->name('dashboard');
    Route::prefix('buyukbas')->group(function () {
        //BLOG
        // Route::post('/buyukbas/sortable', 'BlogController@sortable')->name('blog.Sortable');
        Route::get('/', 'BuyukbasController@index')->name('buyukbas.index');
        Route::get('/tamamlanan', 'BuyukbasController@tamamlanan')->name('buyukbas.tamamlanan');

        Route::get('/video', 'BuyukbasController@video')->name('buyukbas.video');
        Route::get('/arama', 'BuyukbasController@arama')->name('buyukbas.arama');
        Route::get('/kesilmemis', 'BuyukbasController@kesilmemis')->name('buyukbas.kesilmemis');
        Route::get('/rapor', 'BuyukbasController@rapor')->name('buyukbas.rapor');
        Route::get('/detail/{id}', 'BuyukbasController@detail')->name('buyukbas.detail');

        Route::post('/update', 'BuyukbasController@update')->name('buyukbas.update');
        Route::post('/', 'BuyukbasController@index')->name('buyukbas.reload');
        Route::post('/edit', [BuyukbasController::class, 'edit']);
        Route::post('/store', [BuyukbasController::class, 'store']);
        Route::post('/kesilmedrm', [BuyukbasController::class, 'kesilmedrm']);
        Route::post('/videodrm', [BuyukbasController::class, 'videodrm']);
        Route::post('/aramadrm', [BuyukbasController::class, 'aramadrm']);
        Route::post('/vekaletdrm', [BuyukbasController::class, 'vekaletdrm']);
        Route::post('/info', [BuyukbasController::class, 'info']);

        //PAGE
        //Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
        //Route::resource('page', 'PageController');
    });
    Route::prefix('kucukbas')->group(function () {
        //BLOG
        // Route::post('/Kucukbas/sortable', 'BlogController@sortable')->name('blog.Sortable');
        Route::get('/', 'KucukbasController@index')->name('kucukbas.index');
        Route::get('/tamamlanan', 'KucukbasController@tamamlanan')->name('kucukbas.tamamlanan');
        Route::get('/video', 'KucukbasController@video')->name('kucukbas.video');
        Route::get('/arama', 'KucukbasController@arama')->name('kucukbas.arama');
        Route::get('/kesilmemis', 'KucukbasController@kesilmemis')->name('kucukbas.kesilmemis');
        Route::get('/rapor', 'KucukbasController@rapor')->name('kucukbas.rapor');
        Route::get('/detail/{id}', 'KucukbasController@detail')->name('kucukbas.detail');

        Route::post('/update', 'KucukbasController@update')->name('kucukbas.update');
        Route::post('/', 'KucukbasController@index')->name('kucukbas.reload');
        Route::post('/edit', 'KucukbasController@edit');
        Route::post('/store', 'KucukbasController@store');
        Route::post('/kesilmedrm', 'KucukbasController@kesilmedrm');
        Route::post('/videodrm', 'KucukbasController@videodrm');
        Route::post('/aramadrm', 'KucukbasController@aramadrm');
        Route::post('/vekaletdrm', 'KucukbasController@vekaletdrm');
        Route::post('/info', 'KucukbasController@info');

        //PAGE
        //Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
        //Route::resource('page', 'PageController');
    });
    Route::prefix('kamera')->group(function () {
        //BLOG
        // Route::post('/buyukbas/sortable', 'BlogController@sortable')->name('blog.Sortable');

        Route::get('/buyukbas', [KameraController::class, 'buyukbas'])->name('kamera.buyukbas');
        Route::post('/buyukbasSave', [KameraController::class, 'buyukbasSave'])->name('kamera.buyukbas.save');
        Route::post('/store', [BuyukbasController::class, 'store']);
        Route::post('/kesilmedrm', [BuyukbasController::class, 'kesilmedrm']);
        Route::post('/videodrm', [BuyukbasController::class, 'videodrm']);
        Route::post('/aramadrm', [BuyukbasController::class, 'aramadrm']);
        Route::post('/vekaletdrm', [BuyukbasController::class, 'vekaletdrm']);
        Route::post('/info', [BuyukbasController::class, 'info']);

        //PAGE
        //Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
        //Route::resource('page', 'PageController');
    });
});