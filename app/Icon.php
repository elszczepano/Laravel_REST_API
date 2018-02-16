<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = ['name'];

    public function group() {
      return $this->hasMany(Group::class, 'groups')->withTimestamps();
    }
}
