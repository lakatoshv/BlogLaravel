<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

/**
 * Comments controller.
 * 
 * Contains CRUD operations to work with Comments table.
 */
class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @ param  \Illuminate\Http\Request  $request
     * @return Request
     */
    public function create(): Request {
        $this->validate(request(), [
            "comment" => "required|min:2"
        ]);
        $comment = new Comments();
        $comment->comment = html_entity_decode(request("comment"));
        $comment->author = Auth::user()->id;
        $comment->post_id = request("post_id");
        $comment->created_at = date("Y-m-d H:i:s");
        $comment->save();

        return redirect("/posts/".request("post_id"));
    }

    /**
     * Update comment.
     * 
     * @return Response
     */
    public function edit() {
        //Request $request, $id
        $this->validate(request(), [
            "comment" => "required|min:2"
        ]);
        $comment = Comments::find(request("comment_id"));
        if($comment->author == Auth::user()->id) {
            $comment->comment = html_entity_decode(request("comment"));
            $comment->created_at = date("Y-m-d H:i:s");
            $comment->save();
        }
        
        return redirect("/posts/".request("post_id"));
    }

    /**
     * Delete post.
     * 
     * @return Response
     */
    public function delete() {
        $comment = Comments::find(request("comment_id"));
        if($comment->author == Auth::user()->id) {
            $post_id = $comment->post_id;
            $comment->delete();
            return redirect("/posts/".$post_id);
        }
    }
}
