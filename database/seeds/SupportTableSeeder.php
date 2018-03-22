<?php

use Illuminate\Database\Seeder;
use App\Entities\Support;

class SupportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      $support = new Support();

      $support -> email = ('johndoe@example.com');
      $support -> content = $faker->text;
      $support -> attachment = $faker->imageUrl(400, 300);
      $support -> save();
    }
}
