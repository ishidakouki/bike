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


Route::get('/', 'PostsController@index')->middleware('auth')->name('index');

Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup');//新規登録画面移行//
Route::post('signup','Auth\RegisterController@register')->name('signup.post');//新規登録機能//

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\loginController@logout')->name('logout');//ログアウト機能//

Route::get('users/{id}','UsersController@show')->name('users.show');//ユーザー詳細画面表示//
Route::post('users/{id}','UsersController@update')->name('users.update');//ユーザー情報表示//
Route::get('users{id}/edit','UsersController@edit')->name('users.edit');//ユーザー更新画面表示//

Route::get('bike/new','PostsController@index')->name('post.index');//バイク販売ページ表示//
Route::get('post/new','PostsController@create')->name('post.create');//バイク投稿ページ表示//
Route::post('/','PostsController@store')->name('post.store');//バイク投稿機能//
Route::delete('post/{id}','PostsController@delete')->name('posts.destroy');//バイク投稿削除機能//
