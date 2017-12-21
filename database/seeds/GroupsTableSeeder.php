<?php

use Illuminate\Database\Seeder;
use App\Groups;

class GroupsTableSeeder extends Seeder
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
        $group = new Groups();
        $group -> name = $faker->name;
        $group -> description = $faker->text;
        $group -> administrator_id = $faker->randomDigitNotNull;
        $group -> save();
      }
    }
}
