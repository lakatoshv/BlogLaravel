<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public $timestamps = false;

    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("first_name");
            $table->string("last_name");
            $table->text("profile_img")->default("http://ssl.gstatic.com/accounts/ui/avatar_2x.png");
            $table->string("phone_number");
            $table->text("about_me");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}