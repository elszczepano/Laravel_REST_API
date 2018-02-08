<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
        $group = new Group();
        $group -> name = ('Fishing fanatics');
        $group -> description = $faker->text;
        $group -> icon_id = (1);
        $group -> save();

        $group = new Group();
        $group -> name = ('IT Devs');
        $group -> description = $faker->text;
        $group -> icon_id = (1);
        $group -> save();
    }
}
