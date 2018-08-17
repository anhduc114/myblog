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
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
->where('slug','@[\w\d\-\_]+');  //retrict slug character so keyboard can type out
Route::get('/','PagesController@getIndex');
Route::get('contact','PagesController@getContact');
Route::get('about','PagesController@getAbout');
Route::resource('posts','PostController');
