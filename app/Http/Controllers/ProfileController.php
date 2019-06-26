<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function index(){
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $posts = Posts::where('author', Auth::user()->id)->get();

        foreach ($posts as $post) {
            $post->author_id = $post->author;
            $author = DB::table('users')->where('id',$post->author) -> first();
            if($author)
                $post->author = $author->name;
        }
        return view('profile.index', compact('profile'), compact('posts'));
    }
}
