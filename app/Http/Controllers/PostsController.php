<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Posts;
use App\Models\Comments;

class PostsController extends Controller
{
    public function index(){
    	$posts = Posts::all();
    	return view('index', compact('posts'));
    }
    public function show($id){
    	$post = Posts::find($id);
	    $comments = Comments::where("post_id", $id)->get();
	   	return view('posts.show', compact("post"), compact("comments"));
    }
}
