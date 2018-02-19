<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Icon extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name'];

    public function group()
    {
      return $this->belongsTo(Group::class);
    }
}
