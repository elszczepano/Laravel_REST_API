<?php

use Illuminate\Database\Seeder;
use App\Entities\UserGroup;

class UserGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $userGroup = new UserGroup();
      $userGroup -> user_id = (1);
      $userGroup -> group_id = (1);
      $userGroup -> role_id = (1);
      $userGroup -> save();

      $userGroup = new UserGroup();
      $userGroup -> user_id = (2);
      $userGroup -> group_id = (2);
      $userGroup -> role_id = (3);
      $userGroup -> save();
    }
}
