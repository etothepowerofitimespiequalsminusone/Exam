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



Route::get('/','PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');

//Route::get('/', 'PagesController@index');


//Route::get('admin',['middleware' => 'auth'],function(){ return view('/');});
//Route::get('admin/wtf',['middleware' => ['auth','admin']],'AdminController@wtf');

Route::get('admin','AdminController@admin')->name('admin');




Route::resource('album','AlbumController');

Route::resource('collection','CollectionController');
Route::get('collect/{id}','CollectionController@create');

