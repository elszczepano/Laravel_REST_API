<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->increments('id');
      $table->text('content');
      $table->integer('rating')->default(0);
      $table->integer('user_id')->unsigned();
      $table->integer('group_id')->unsigned();
      $table->timestamps();
    });
    Schema::table('posts', function (Blueprint $table) {
      $table->foreign('user_id')
      ->references('id')
      ->on('users');
    });
    Schema::table('posts', function (Blueprint $table) {
      $table->foreign('group_id')
      ->references('id')
      ->on('groups');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('posts');
  }
}
