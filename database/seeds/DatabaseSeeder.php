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
        UsersTableSeeder::class,
        IconsTableSeeder::class,
        RolesTableSeeder::class,
        GroupsTableSeeder::class,
        UsersHasGroupsSeeder::class,
        PostsTableSeeder::class
      ]);
    }
}
