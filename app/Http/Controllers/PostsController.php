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
        foreach ($posts as $post) {
            $post->author_id = $post->author;
            $author = DB::table('users')->where('id',$post->author) -> first();
            if($author)
                $post->author = $author->name;
        }
    	return view('index', compact('posts'));
    }
    public function show($id){
    	$post = Posts::find($id);
        $author_id = $post->author;
        $author = DB::table('users')->where('id',$post->author) -> first();
        if($author)
            $post->author = $author->name;
	    $comments = Comments::where("post_id", $id)->get();
        foreach ($comments as $comment) {
            $author = DB::table('users')->where('id',$comment->author) -> first();
            if($author)
                $comment->author = $author->name;
        }
	   	return view('posts.show', compact("post"), compact("comments"))->with("author_id", $author_id);
    }
    public function create(){
        $posts = Posts::all();
        return view('posts.create');
    }
    public function store(){
        //dd(request()->all());
        $this->validate(request(), [
            "title" => "required|min:2",
            "description" => "required",
            "content" => "required",
            "tags" => "required",
            "img_url" => "required",
            "alias" => "required",
        ]);
        $post = new Posts();
        $post->title = request("title");
        $post->description = html_entity_decode(request("description"));
        $post->content = html_entity_decode(request("content"));
        $post->author = Auth::user()->id;
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
        /*
        Posts::create(
            request(array())
        );
        */
        return redirect("/");
    }

    public function like($id){
        $post = Posts::find($id);
        $post->likes += 1;
        $post->save();
        return redirect("/posts/".$post->id);
    }
    public function dislike($id){
        $post = Posts::find($id);
        $post->dislikes += 1;
        $post->save();
        return redirect("/posts/".$post->id);
    }

    public function edit($id){
        $post = Posts::find($id);
        if($post->author == Auth::user()->id){
            return view('posts.edit', compact("post"));
        }
        else
            return redirect("/");
    }

    public function delete(){
        $post = Posts::find(request("post_id"));
        if($post->author == Auth::user()->id){
            $post->delete();
            return redirect("/");
        }
    }

    public function myPosts(){
        $posts = Posts::where('author', Auth::user()->id)->get();
        foreach ($posts as $post) {
            $post->author_id = $post->author;
            $author = DB::table('users')->where('id',$post->author) -> first();
            if($author)
                $post->author = $author->name;
        }
        return view('posts.myPosts', compact('posts'));
    }

    public function update(){
        $id = html_entity_decode(request("id"));
        //Request $request, $id
        $this->validate(request(), [
            "title" => "required|min:2",
            "description" => "required",
            "content" => "required",
            "tags" => "required",
            "img_url" => "required",
            "alias" => "required",
        ]);
        $post = Posts::find($id);
        if($post->author == Auth::user()->id){
            $post->title = html_entity_decode(request("title"));
            $post->description = html_entity_decode(request("description"));
            $post->content = html_entity_decode(request("content"));
            $post->tags = html_entity_decode(request("tags"));
            $post->imgurl = html_entity_decode(request("img_url"));
            $post->alias = html_entity_decode(request("alias"));
            $post->created_at = date("Y-m-d H:i:s");
            $post->save();
            return redirect("/posts/".request("post_id"));
        }
        else
            return redirect("/");
        
        
    }
}
