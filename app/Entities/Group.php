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
    protected $dates = ['deleted_at'];

    public function user()
    {
      return $this->belongsToMany(User::class, 'user_groups')->whereNull('user_groups.deleted_at')->withPivot('id')->withTimestamps();
    }

    public function role()
    {
      return $this->hasMany(Role::class);
    }

    public function post()
    {
      return $this->hasMany(Post::class);
    }

    public function icon()
    {
      return $this->belongsTo(Icon::class);
    }

    public function joinRequests()
    {
      return $this->hasMany(JoinRequests::class);
    }
}
