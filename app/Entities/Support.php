<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Support.
 *
 * @package namespace App\Entities;
 */
class Support extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['content', 'email', 'attachment'];

}
