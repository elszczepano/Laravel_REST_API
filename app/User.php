<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups() {
      return $this->belongsToMany(Groups::class, 'users_has_groups', 'user_id', 'group_id', 'role_id')->withTimestamps();
    }
    public function notifications() {
      return $this->belongsToMany(notifications::class, 'users_has_notifications', 'user_id', 'notification_id')->withTimestamps();
    }
}
