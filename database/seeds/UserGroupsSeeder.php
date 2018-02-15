<?php

use Illuminate\Database\Seeder;
use App\UserGroups;

class UserGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pivot = new UserGroups();
      $pivot -> user_id = (1);
      $pivot -> group_id = (1);
      $pivot -> role_id = (1);
      $pivot -> save();

      $pivot = new UserGroups();
      $pivot -> user_id = (2);
      $pivot -> group_id = (2);
      $pivot -> role_id = (3);
      $pivot -> save();
    }
}
