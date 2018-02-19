<?php

use Illuminate\Database\Seeder;
use App\Entities\Icon;

class IconTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $icon = new Icon();
      $icon -> name = ('envelope');
      $icon -> save();
    }
}
