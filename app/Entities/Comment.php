<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Comment extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    protected $fillable = ['content', 'user_id', 'post_id'];
    protected $dates = ['deleted_at'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function post()
    {
      return $this->belongsTo(Post::class);
    }
}
