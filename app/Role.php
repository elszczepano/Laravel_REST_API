<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $hidden = ['id'];

    public function user() {
      return $this->belongsToMany(User::class, 'user_groups')->withTimestamps();
    }
}
