<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\IconRepository;
use App\Entities\Icon;
use App\Validators\IconValidator;

class IconRepositoryEloquent extends BaseRepository implements IconRepository
{
  	public function editIcon($params, $id)
  	{
  		$icon = $this->update($params, $id);
  		return $icon;
  	}

    public function model()
    {
        return Icon::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
