<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Posts;

class PostsController extends Controller
{
    public function index(){
    	$posts = Posts::all();
    	return view('index', compact('posts'));
    }
    public function show($id){
    	$post = Posts::find($id);
	    $comments = DB::table("comments")->where("post_id", $id)->get();
	   	return view('posts.show', compact("post"), compact("comments"));
    }
}
