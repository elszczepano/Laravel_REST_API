<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Authenticatable implements Transformable
{
  use Notifiable;
  use SoftDeletes;
  use TransformableTrait;

  protected $fillable = ['name', 'surname', 'avatar', 'email', 'birth_date', 'password'];
  protected $hidden = ['id', 'password'];
  protected $dates = ['deleted_at'];


  public function post() {
    return $this->hasMany(Post::class);
  }

  public function comments() {
    return $this->hasMany(Comment::class);
  }

  public function notification()
  {
    return $this->hasMany(Notification::class);
  }

  public function group() {
    return $this->belongsToMany(Group::class, 'user_groups')->withTimestamps();
  }

  public function role() {
    return $this->belongsToMany(Role::class, 'user_groups')->withTimestamps();
  }

  public function vote() {
    return $this->hasMany(Vote::class);
  }
}
