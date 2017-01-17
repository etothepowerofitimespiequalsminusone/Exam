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

Route::get('admin','AdminController@admin')->name('admin');
Route::get('admin/albums','AdminController@albums')->name('admin.albums');

Route::resource('album','AlbumController');
Route::resource('albumimage','AlbumImageController');

Route::resource('collection','CollectionController');
Route::get('collect/{id}','CollectionController@create');

Route::get('leaked','PagesController@leaked');
Route::get('coming','PagesController@coming');
Route::get('itunes','PagesController@itunes');


Route::post('image',function (){
    request()->file('image')->store('images');

    return back();
});

//for email, decided to use notifications instead
//Route::get('/send','EmailController@send');

//Route::get('/email', function (){
////    dd(Config::get('mail'));
//   Mail::send('Email.send',['title' => 'Working!', 'content' => 'this is working isnt it?'],function ($message){
//        $message->to('mlaganovskis@gmail.com','Mārtiņš')->from('musictracker@mt.com')->subject('Email does send!');
//   }) ;
//});





