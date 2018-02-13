<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'description', 'icon_id'];
    protected $hidden = ['id'];

    public function users() {
      return $this->belongsToMany(User::class, 'users_has_groups', 'user_id', 'group_id')->withTimestamps();
    }
}
