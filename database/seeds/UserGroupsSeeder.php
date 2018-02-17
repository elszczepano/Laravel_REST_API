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
      $userGroups = new UserGroups();
      $userGroups -> user_id = (1);
      $userGroups -> group_id = (1);
      $userGroups -> role_id = (1);
      $userGroups -> save();

      $userGroups = new UserGroups();
      $userGroups -> user_id = (2);
      $userGroups -> group_id = (2);
      $userGroups -> role_id = (3);
      $userGroups -> save();
    }
}
