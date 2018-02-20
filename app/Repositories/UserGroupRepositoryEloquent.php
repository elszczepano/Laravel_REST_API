<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserGroupRepository;
use App\Entities\UserGroup;

class UserGroupRepositoryEloquent extends BaseRepository implements UserGroupRepository
{
  public function createUserGroup($params)
  {
    $userGroup = new UserGroup();
    $userGroup->fill($params);
    $userGroup->save();
  }

  public function editUserGroup($params, $id)
  {
    $userGroup = $this->update($params, $id);
    return $userGroup;
  }

  public function model()
  {
    return UserGroup::class;
  }

  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
