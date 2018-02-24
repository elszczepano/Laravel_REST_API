<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoleRepository;
use App\Entities\Role;
use App\Validators\RoleValidator;

class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
  public function editRole($params, $id)
  {
    $role = $this->update($params, $id);
    return $role;
  }

  public function model()
  {
    return Role::class;
  }

  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
