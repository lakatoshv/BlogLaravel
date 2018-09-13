<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

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
    public function create(){
        $posts = Posts::all();
        return view('posts.create');
    }
    public function store(){
        //dd(request()->all()); 
        $post = new Posts();
        $post->title = request("title");
        $post->description = html_entity_decode(request("description"));
        $post->content = html_entity_decode(request("content"));
        $post->author = Auth::user()->name;
        $post->tags = request("tags");
        if(request("gallery_img") != null){}
        else if(request("img_url") != null) $post->imgurl = request("img_url");
        if(request("access") != null){
            $post->access = request("access"); 
        }
        else $post->access = "free";
        $post->created_at = date("Y-m-d H:i:s");
        $post->alias = "test";
        $post->save();
        return redirect("/");
    }
}
