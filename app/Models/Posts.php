<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Posts entity.
 */
class Posts extends Model
{
    //Editable fields
    protected $fillable = ["title", "description", "content", "author", "seen", "likes", "dislikes", "tags", "imgurl", "access", "created_at", "updated_at", "alias"];
    //non-editable fields
    //protected $guarded =[...]
}
