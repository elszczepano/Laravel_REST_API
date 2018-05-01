<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


class Post extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    protected $fillable = ['content', 'rating', 'user_id', 'group_id'];
    protected $dates = ['deleted_at'];

    public function comment()
    {
      return $this->hasMany(Comment::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function group()
    {
      return $this->belongsTo(Group::class);
    }

    public function vote()
    {
      return $this->hasMany(Vote::class);
    }
}
