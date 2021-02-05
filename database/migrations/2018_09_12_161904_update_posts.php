<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Update posts table migration.
 */
class UpdatePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table("posts", function(Blueprint $table){
            $table->string("alias");
        });
    }

    public function down(): void
    {
        Schema::table("posts", function(Blueprint $table){
            $table->dropColumn("alias");
        });
    }
}
