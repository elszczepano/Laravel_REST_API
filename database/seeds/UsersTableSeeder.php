<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
        $user = new User();
        $user -> name = ('John');
        $user -> surname = ('Doe');
        $user -> email = ('johndoe@example.com');
        $user -> birth_date = $faker->dateTime;
        $user -> password = bcrypt('secret');
        $user -> save();
    }
}
