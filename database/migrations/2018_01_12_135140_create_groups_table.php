<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('groups', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->text('description')->nullable();
      $table->text('background_image')->nullable();
      $table->integer('icon_id')->unsigned();
      $table->timestamps();
    });
    Schema::table('groups', function (Blueprint $table) {
      $table->foreign('icon_id')
      ->references('id')
      ->on('icons');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('groups');
  }
}
