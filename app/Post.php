<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['content'];
    protected $hidden = ['id'];
    protected $dates = ['deleted_at'];

    public function comment()
    {
      return $this->hasMany(Comment::class);
    }

    public function vote()
    {
      return $this->hasMany(Vote::class);
    }
}
