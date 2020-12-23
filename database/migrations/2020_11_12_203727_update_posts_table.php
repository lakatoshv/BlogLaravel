<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("posts", function(Blueprint $table){
            $table->integer("category_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->text('excerpt')->nullable();
            
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("posts", function(Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('category_id');

            $table->dropColumn("category_id");
            $table->dropColumn("user_id");
            $table->dropColumn("excerpt");
            $table->dropColumn("is_published");
            $table->dropColumn("published_at");
        });
    }
}
