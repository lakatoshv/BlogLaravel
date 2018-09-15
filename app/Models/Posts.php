<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //поля, які можна редагувати
    protected $fillable = ["title", "description", "content", "author", "seen", "likes", "dislikes", "tags", "imgurl", "access", "created_at", "updated_at", "alias"];
    //захищені поля(не можна редагувати)
    //protected $guarded =[...]
}
