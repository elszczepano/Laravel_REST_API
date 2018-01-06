<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHasGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('groups_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('users_has_groups', function (Blueprint $table) {
            $table->foreign('users_id')
            ->references('id')
            ->on('users');
        });
        Schema::table('users_has_groups', function (Blueprint $table) {
            $table->foreign('groups_id')
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
        Schema::dropIfExists('users_has_groups');
    }
}
