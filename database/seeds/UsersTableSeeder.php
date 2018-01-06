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

      for ($i=0; $i < 10; $i++) {
        $user = new User();
        $user -> name = $faker->name;
        $user -> surname = $faker->lastName;
        $user -> email = $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}');
        $user -> birth_date = $faker->dateTime;
        $user -> password = bcrypt($faker->word);
        $user -> save();
      }
    }
}
