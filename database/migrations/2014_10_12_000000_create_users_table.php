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
      $table->string('name');
      $table->string('surname')->nullable();
      $table->string('avatar')->nullable()->default('https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png');
      $table->string('email')->unique();
      $table->date('birth_date')->nullable();
      $table->string('password');
      $table->timestamps();
      $table->softDeletes();
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
