<?php

use Illuminate\Database\Seeder;
use App\Icons;

class IconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $icon = new Icons();
      $icon -> name = ('envelope');
      $icon -> save();
    }
}
