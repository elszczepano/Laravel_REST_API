<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('notifications', function (Blueprint $table) {
      $table->increments('id');
      $table->string('content');
      $table->integer('user_id')->unsigned();
      $table->boolean('read')->default(false);
      $table->timestamps();
      $table->softDeletes();

      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('notifications');
  }
}
