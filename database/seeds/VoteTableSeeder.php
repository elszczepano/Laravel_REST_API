<?php

use Illuminate\Database\Seeder;
use App\Entities\Vote;

class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

      for ($i=0; $i < 5; $i++) {
        $vote = new Vote();
        $vote -> user_id = (1);
        $vote -> post_id = $faker->randomDigitNotNull;
        $vote -> voted = true;
        $vote -> save();
      }

      for ($i=0; $i < 5; $i++) {
        $vote = new Vote();
        $vote -> user_id = (2);
        $vote -> post_id = $faker->randomDigitNotNull;
        $vote -> voted = false;
        $vote -> save();
      }
    }
}
