<?php

use Illuminate\Database\Seeder;
use App\UsersHasGroups;

class UsersHasGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pivot = new UsersHasGroups();
      $pivot -> user_id = (1);
      $pivot -> group_id = (1);
      $pivot -> role_id = (1);
      $pivot -> save();
    }
}
