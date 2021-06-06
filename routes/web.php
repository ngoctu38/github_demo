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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('products','App\Http\Controllers\ProductController');
Route::resource('operations','App\Http\Controllers\OperationController');

Route::group(['prefix' => 'products'], function (){
    Route::get('/index', 'App\Http\Controllers\ProductController@index')->name('products.index');
    Route::get('/create', 'App\Http\Controllers\ProductController@create')->name('products.create');
    Route::post('/import', 'App\Http\Controllers\ProductController@import')->name('products.import');
    Route::post('/export', 'App\Http\Controllers\ProductController@export')->name('products.export');
        Route::post('/importExcel', 'App\Http\Controllers\ProductController@importExcel')->name('products.importExcel');

});
