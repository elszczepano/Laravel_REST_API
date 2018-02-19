<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserGroups extends Model implements Transformable
{
  use SoftDeletes;
  use TransformableTrait;

  protected $dates = ['deleted_at'];
}
