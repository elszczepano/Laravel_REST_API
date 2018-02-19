<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Group extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    protected $fillable = ['name', 'description','background_image', 'icon_id'];
    protected $hidden = ['id'];
    protected $dates = ['deleted_at'];

    public function user() {
      return $this->belongsToMany(User::class, 'user_groups')->withTimestamps();
    }

    public function post() {
      return $this->hasMany(Post::class);
    }
}
