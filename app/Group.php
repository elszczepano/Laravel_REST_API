<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    protected $fillable = ['name', 'description','background_image', 'icon_id'];
    protected $hidden = ['id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function user() {
      return $this->belongsToMany(User::class, 'user_groups')->withTimestamps();
    }
    public function role() {
      return $this->belongsToMany(Role::class, 'user_groups')->withTimestamps();
    }
}
