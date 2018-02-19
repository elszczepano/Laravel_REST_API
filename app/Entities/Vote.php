<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Vote extends Model implements Transformable
{
  use SoftDeletes;
  use TransformableTrait;

  protected $fillable = ['voted'];
  protected $hidden = ['id'];
}
