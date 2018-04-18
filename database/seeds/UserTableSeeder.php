<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class UserTableSeeder extends Seeder
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
        $user -> description = $faker->text;
        $user -> password = bcrypt('secret');
        $user -> save();

        $user = new User();
        $user -> name = ('Jack');
        $user -> surname = ('Doe');
        $user -> email = ('jackdoe@example.com');
        $user -> birth_date = $faker->dateTime;
        $user -> password = bcrypt('secret');
        $user -> save();
    }
}
