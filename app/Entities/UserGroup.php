<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserGroup extends Model implements Transformable
{
  use SoftDeletes;
  use TransformableTrait;

  protected $fillable = ['user_id', 'group_id', 'role_id'];
  protected $dates = ['deleted_at'];


  public function user()
  {
    return $this->belongsTo(User::class);
  }


  public function group()
  {
    return $this->belongsTo(Group::class);
  }


  public function role()
  {
    return $this->belongsTo(Role::class);
  }
}
