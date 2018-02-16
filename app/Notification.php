<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['content'];
    protected $hidden = ['id'];

    public function user() {
      return $this->belongsToMany(User::class, 'user_notifications')->withTimestamps();
    }
}
