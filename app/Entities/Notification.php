<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Notification extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    protected $fillable = ['content'];
    protected $hidden = ['id'];
    protected $dates = ['deleted_at'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
