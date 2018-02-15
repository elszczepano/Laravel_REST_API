<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ['content'];
    protected $hidden = ['id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
