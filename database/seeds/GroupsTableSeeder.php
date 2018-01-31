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
        $group = new Groups();
        $group -> name = ('Fishing fanatics');
        $group -> description = $faker->text;
        $group -> icon_id = (1);
        $group -> save();
        
        $group = new Groups();
        $group -> name = ('IT Devs');
        $group -> description = $faker->text;
        $group -> icon_id = (1);
        $group -> save();
    }
}
