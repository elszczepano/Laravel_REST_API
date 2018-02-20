<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Role extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name'];
    protected $hidden = ['id'];

    public function user()
    {
      return $this->belongsToMany(User::class, 'user_groups')->withTimestamps();
    }
}
