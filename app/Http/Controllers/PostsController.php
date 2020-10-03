<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\Posts;
use App\Models\Comments;

/**
 * Posts controller.
 * 
 * Contains CRUDa operations to work with Posts table.
 */
class PostsController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View {
    	$posts = Posts::paginate(15);
        foreach ($posts as $post) {
            $post->author_id = $post->author;
            $author = DB::table('users')->where('id',$post->author) -> first();

            if($author) {
                $post->author = $author->name;
            }
        }

    	return view('index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id): View{
    	$post = Posts::find($id);
        $author_id = $post->author;
        $author = DB::table('users')->where('id',$post->author) -> first();

        if($author) {
            $post->author = $author->name;
        }

	    $comments = Comments::where("post_id", $id)->paginate(15);;
        foreach ($comments as $comment) {
            $author = DB::table('users')->where('id',$comment->author) -> first();
            
            if($author) {
                $comment->author = $author->name;
            }

        }	   	
        
        return view('posts.show', compact("post"), compact("comments"))->with("author_id", $author_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View {
        $posts = Posts::all();

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @ param  \Illuminate\Http\Request  $request
     * @return View
     */
    public function store(): View {
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

        if(request("gallery_img") != null) {}
        else if(request("img_url") != null) {
            $post->imgurl = request("img_url");
        }

        if(request("access") != null){
            $post->access = request("access"); 
        }
        else {
            $post->access = "free";
        }

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

    /**
     * Add like to post.
     *
     * @param int
     * 
     * @return Response
     */
    public function like(int $id): Response {
        $post = Posts::find($id);
        $post->likes += 1;
        $post->save();

        return redirect("/posts/".$post->id);
    }

    /**
     * Add dislike to post.
     *
     * @param int
     * 
     * @return Response
     */
    public function dislike(int $id): Response {
        $post = Posts::find($id);
        $post->dislikes += 1;
        $post->save();

        return redirect("/posts/".$post->id);
    }

    /**
     * Edit post.
     *
     * @param int
     * 
     * @return Response
     */
    public function edit(int $id): Response {
        $post = Posts::find($id);

        if($post->author == Auth::user()->id) {
            return view('posts.edit', compact("post"));
        }
        else {
            return redirect("/");
        }
    }

    /**
     * Delete post.
     *
     * @param int
     * 
     * @return Response
     */
    public function delete(): Response {
        $post = Posts::find(request("post_id"));

        if($post->author == Auth::user()->id){
            $post->delete();

            return redirect("/");
        }
    }

    /**
     * DIsplay current user posts with filters.
     *
     * @param int
     * 
     * @return View
     */
    public function myPostsWithSearch($search = null, $sortBy = null, $orderBy = null): View {
        $posts = Posts::where('author', Auth::user()->id)::paginate(15);

        if($search != null) {
            $posts = $posts->where('title', 'like', '%'.$search.'%');
        }

        if($sortBy != null && $orderBy != null) {
            $posts = $posts->orderBy($sortBy);
        }

        foreach ($posts as $post) {
            $post->author_id = $post->author;
            $author = DB::table('users')->where('id',$post->author) -> first();
            if($author) {
                $post->author = $author->name;
            }
        }

        return view('posts.myPosts', compact('posts'));
    }

    /**
     * Add like to post.
     *
     * @param int
     * 
     * @return View
     */
    public function myPosts($display = "list", $sortBy = null, $orderBy = null): View{
        $posts = Posts::where('author', Auth::user()->id);

        if($sortBy != null && $orderBy != null){
            $posts = $posts->orderBy($sortBy, $orderBy);
        }

        if($display == "list")
            $posts = $posts->paginate(15);

        foreach ($posts as $post) {
            $post->author_id = $post->author;
            $author = DB::table('users')->where('id',$post->author) -> first();

            if($author)
                $post->author = $author->name;
        }

        return view('posts.myPosts', compact('posts'))->with("display", $display);
    }

    public function update(): Response{
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
