<?php

use Illuminate\Database\Seeder;
use App\Entities\Post;

class PostTableSeeder extends Seeder
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
        $post = new Post();
        $post -> user_id = (1);
        $post -> group_id = (1);
        $post -> content = $faker->text;
        $post -> rating = $faker->randomDigitNotNull;
        $post -> save();
      }
      for ($i=0; $i < 10; $i++) {
        $post = new Post();
        $post -> user_id = (2);
        $post -> group_id = (2);
        $post -> content = $faker->text;
        $post -> rating = $faker->randomDigitNotNull;
        $post -> save();
      }
    }
}
