<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("post_views", function(Blueprint $table)
        {
          $table->increments("id");
          $table->unsignedInteger("post_id");
          $table->string("titleslug");
          $table->string("url");
          $table->string("session_id");
          $table->unsignedInteger('user_id')->nullable();
          $table->string("ip");
          $table->string("agent");
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_views');
    }
}
