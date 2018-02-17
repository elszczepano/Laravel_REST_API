<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        UserTableSeeder::class,
        IconTableSeeder::class,
        RoleTableSeeder::class,
        GroupTableSeeder::class,
        UserGroupsSeeder::class,
        PostTableSeeder::class,
        CommentTableSeeder::class,
        NotificationTableSeeder::class,
        VoteTableSeeder::class
      ]);
    }
}
