<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostsController extends Controller
{
    public function index(){
    	$posts = DB::table("posts")->get();
    	return view('index', compact('posts'));
    }
    public function show($id){
    	$post = DB::table("posts")->find($id);
	    $comments = DB::table("comments")->where("post_id", $id)->get();
	   	return view('posts.show', compact("post"), compact("comments"));
    }
}
