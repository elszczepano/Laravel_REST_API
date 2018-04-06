<?php

use Illuminate\Database\Seeder;
use App\Entities\Icon;

class IconTableSeeder extends Seeder
{
    public function run()
    {
      $icons = [
        'group',
        'address-book',
        'address-card',
        'envelope',
        'microchip',
        'shower',
        'thermometer',
        'anchor',
        'area-chart',
        'at',
        'bank',
        'battery',
        'bell',
        'bicycle',
        'birthday-cake',
        'bolt',
        'bomb',
        'book',
        'bookmark',
        'briefcase',
        'bug',
        'calendar',
        'car',
        'check',
        'cloud',
        'coffee',
        'cogs',
        'code',
        'commenting',
        'cutlery',
        'tachometer',
        'database',
        'diamond',
        'feed',
        'flag',
        'glass',
        'gift',
        'globe',
        'heart',
        'home',
        'key',
        'laptop',
        'leaf',
        'map',
        'map-marker',
        'money',
        'music',
        'pencil',
        'paw',
        'phone',
        'plane',
        'plug',
        'rocket',
        'search',
        'snowflake-o',
        'star',
        'support',
        'suitcase',
        'tag',
        'tint',
        'trash',
        'tree',
        'trophy',
        'truck',
        'umbrella',
        'wifi',
        'wrench',
        'video-camera',
        'motorcycle',
        'btc',
        'dollar',
        'euro'
      ];

      foreach ($icons as $name) {
        $icon = new Icon();
        $icon -> name = ($name);
        $icon -> save();
      }
    }
}
