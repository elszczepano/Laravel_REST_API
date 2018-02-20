<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GroupRepository;
use App\Entities\Group;

class GroupRepositoryEloquent extends BaseRepository implements GroupRepository
{

  public function editGroup($params, $id)
  {
    $group = $this->update($params, $id);
    return $group;
  }

  public function model()
  {
    return Group::class;
  }

  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
