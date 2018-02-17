<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
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
      $comment = new Comment();
      $comment -> content = $faker->text;
      $comment -> user_id = (1);
      $comment -> post_id = $faker->randomDigitNotNull;
      $comment -> save();
    }
    for ($i=0; $i < 10; $i++) {
      $comment = new Comment();
      $comment -> content = $faker->text;
      $comment -> user_id = (2);
      $comment -> post_id = $faker->randomDigitNotNull;
      $comment -> save();
    }
  }
}
