<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Roles();
        $role -> name = 'Admin';
        $role -> save();

        $role = new Roles();
        $role -> name = 'Moderator';
        $role -> save();

        $role = new Roles();
        $role -> name = 'User';
        $role -> save();
    }
}
