<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->integer('user_id');
            $table->boolean('show_fb_link')->default(true);
            $table->boolean('show_men')->default(false);
            $table->boolean('show_women')->default(false);
            $table->boolean('notify_on_new_winks')->default(true);
            //$table->boolean('notify_on_requests_accepted')->default(true);
            $table->boolean('notify_on_new_message')->default(true);
            $table->boolean('account_soft_delete')->default(false);
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
