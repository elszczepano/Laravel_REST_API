<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = ['name'];

    public function group() {
      return $this->belongsTo(Group::class);
    }
}
