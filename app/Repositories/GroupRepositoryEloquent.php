<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GroupRepository;
use App\Entities\Group;

class GroupRepositoryEloquent extends BaseRepository implements GroupRepository
{
  protected $directory;

  public function __construct()
  {
     $this->directory = Date('ym');
  }

  public function createGroup($params)
  {
    $user = new User();
    if(isset($params['background_image'])) {
      $params['background_image'] = Storage::disk('public')->put($directory, $params['background_image']);
    }
    $user->fill($params);
    $user->save();

    return $user;
  }


  public function editGroup($params, $id)
  {
    if(isset($params['background_image'])) {
      $params['background_image'] = Storage::disk('public')->put($directory, $params['background_image']);
    }
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
