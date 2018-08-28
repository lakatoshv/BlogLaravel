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

Route::group(["prefix" => "admin", "namespace" => "Admin", "middleware" =>["auth"]], function(){
	Route::get("/", "DashboardController@dashboard")->name("admin.index");
});
 
Route::get('/', "PostsController@index");
Route::get('/posts', "PostsController@index");
Route::get('posts/{id}', "PostsController@show");
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contacts');
});
Auth::routes();