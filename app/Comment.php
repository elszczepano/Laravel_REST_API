<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['content'];
    protected $hidden = ['id'];
    protected $dates = ['deleted_at'];

    public function post() {
      return $this->belongsTo(Post::class);
    }
}
