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

    protected $fillable = ['content'];
    protected $hidden = ['id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function post() {
      return $this->belongsTo(Post::class);
    }
}
