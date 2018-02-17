<?php

use Illuminate\Database\Seeder;
use App\Notification;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $notification = new Notification();
      $notification -> content = 'New post in group';
      $notification -> user_id = (1);
      $notification -> read = true;
      $notification -> save();

      $notification = new Notification();
      $notification -> content = 'User voted up your post';
      $notification -> user_id = (2);
      $notification -> read = false;
      $notification -> save();
    }
}
