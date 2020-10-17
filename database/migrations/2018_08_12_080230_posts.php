<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Posts table migration.
 */
class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->text("description");
            $table->text("content");
            $table->text("author");
            $table->integer("seen")->default(0);
            $table->integer("likes")->default(0);
            $table->integer("dislikes")->default(0);
            $table->string("tags");
            $table->string("imgurl");
            $table->string("access");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
}
