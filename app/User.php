<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  protected $fillable = ['name', 'surname', 'avatar', 'email', 'birth_date', 'password'];
  protected $hidden = ['id', 'password'];

  use SoftDeletes;

  protected $dates = ['deleted_at'];

  public function generateToken()
  {
    $this->api_token = str_random(60);
    $this->save();

    return $this->api_token;
  }

  public function group() {
    return $this->belongsToMany(Group::class);
  }

  public function role() {
    return $this->belongsToMany(Role::class);
  }

  public function notification() {
    return $this->belongsToMany(Notification::class);
  }

  public function vote() {
    return $this->belongsToMany(Vote::class);
  }

  public function hasAnyRole($roles)
  {
    if (is_array($roles)) {
      foreach ($roles as $role) {
        if ($this->hasRole($role)) {
          return true;
        }
      }
    } else {
      if ($this->hasRole($roles)) {
        return true;
      }
    }
    return false;
  }

  public function hasRole($role)
  {
    if ($this->roles()->where('roles.name', $role)->first()) {
      return true;
    }
    return false;
  }
}
