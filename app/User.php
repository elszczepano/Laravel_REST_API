<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;
  
  protected $fillable = ['name', 'surname', 'avatar', 'email', 'birth_date', 'api_token', 'password'];
  protected $hidden = ['id', 'password'];

  public function generateToken()
  {
    $this->api_token = str_random(60);
    $this->save();

    return $this->api_token;
  }
  public function groups() {
    return $this->belongsToMany(Group::class, 'users_has_groups', 'user_id', 'group_id')->withTimestamps();
  }
  public function roles() {
    return $this->belongsToMany(Role::class, 'users_has_groups', 'user_id', 'role_id')->withTimestamps();
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
