<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create(){
         $this->validate(request(), [
            "email" => "required|min:2",
            "comment" => "required|min:2"
        ]);
        $comment = new Comments();
        $comment->comment = html_entity_decode(request("comment"));
        $comment->author = Auth::user()->name;
        $comment->post_id = request("post_id");
        $comment->created_at = date("Y-m-d H:i:s");
        $comment->save();
        return redirect("/posts/".request("post_id"));
    }
}
