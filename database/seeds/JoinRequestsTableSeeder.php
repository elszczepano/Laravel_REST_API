<?php

use Illuminate\Database\Seeder;
use App\Entities\JoinRequests;

class JoinRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $joinRequests = new JoinRequests();
      $joinRequests -> user_id = (1);
      $joinRequests -> group_id = (1);
      $joinRequests -> approved = (true);
      $joinRequests -> save();

      $joinRequests = new JoinRequests();
      $joinRequests -> user_id = (2);
      $joinRequests -> group_id = (2);
      $joinRequests -> save();

      $joinRequests = new JoinRequests();
      $joinRequests -> user_id = (1);
      $joinRequests -> group_id = (2);
      $joinRequests -> approved = (false);
      $joinRequests -> save();
    }
}
