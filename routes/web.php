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
//Authentication
Route::get('auth/login', ['as'=> 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', ['as'=> 'logout', 'uses' =>'Auth\LoginController@logout']);

//Registration
Route::get('auth/register', ['as'=>'signup', 'uses'=>'Auth\RegisterController@showRegistrationForm']);
Route::post('auth/register', 'Auth\RegisterController@register');

//Password Reset
Route::get('password/reset/{token?}','Auth\ResetPasswordController@showResetForm');
Route::post('password/email','Auth\ResetPasswordController@sendResetLinkEmail');
Route::post('password/reset','Auth\ResetPasswordController@reset');

//Categories
Route::resource('categories','CategoryController', ['except' => ['create']]);
//Route::get('categories/index','CategoryController@index');

//COmments
Route::post('comments/{post_id}', [ 'uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', [ 'uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', [ 'uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', [ 'uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);


//Tags
Route::resource('tags','TagController', ['except' => ['create']]);


Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
->where('slug','[\w\d\-\_]+');  //retrict slug character so keyboard can type out
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('/','PagesController@getIndex');
Route::get('contact','PagesController@getContact');
Route::get('about','PagesController@getAbout');
Route::resource('posts','PostController');
