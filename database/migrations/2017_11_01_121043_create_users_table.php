<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fb_profile_uri')->default(null);
            $table->integer('fb_id');            
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('age');
            $table->string('gender');
            $table->string('location');
            $table->integer('profile_views')->default(0);
            $table->string('about')->default("");
            $table->integer('winks_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('users');
    }
}
