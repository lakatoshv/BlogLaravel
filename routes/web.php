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

/*
Route::group(["prefix" => "admin", "namespace" => "Admin", "middleware" => ["admin", "superadmin"]], function(){
	Route::get("/", "DashboardController@dashboard")->name("admin.index");
});
Route::group(["middleware" => ["auth", "admin", "editor", "superadmin"]], function(){
	Route::get("posts/create", "PostsController@create");
});
*/
Route::group(["prefix" => "admin", "namespace" => "Admin", "middleware" => ["admin"]], function(){
	Route::get("/", "DashboardController@dashboard")->name("admin.index");
});
Route::group(["middleware" => ["auth"]], function(){
	Route::get("posts/create", "PostsController@create");
	Route::post("post", "PostsController@store");
	Route::get('posts/{id}/like', "PostsController@like");
	Route::get('posts/{id}/dislike', "PostsController@dislike");

	Route::post("add-comment", "CommentsController@create");
	Route::post("edit-comment", "CommentsController@edit");
	Route::post("/delete-comment", "CommentsController@delete");
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