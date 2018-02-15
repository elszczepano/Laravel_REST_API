<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    protected $fillable = ['name', 'description', 'icon_id'];
    protected $hidden = ['id'];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function group() {
      return $this->belongsToMany(User::class);
    }
}
