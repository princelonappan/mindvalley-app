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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('article/search', 'ArticleController@search');
Route::get('/', 'ArticleController@index');
Route::resource('article', 'ArticleController');
Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();


Route::group(array('namespace' => 'admin', 'prefix' => 'admin', 'middleware' => 'admin'), function () {
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
});
