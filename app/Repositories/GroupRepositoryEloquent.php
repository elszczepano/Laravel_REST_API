<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GroupRepository;
use App\Entities\Group;
use App\Validators\GroupValidator;
use Illuminate\Support\Facades\Storage;

class GroupRepositoryEloquent extends BaseRepository implements GroupRepository
{

  public function directory()
  {
    $directory = Date('ym');
    return $directory;
  }

  public function createGroup($params)
  {
      $group = new Group();
      if(isset($params['background_image'])) {
        $params['background_image'] = Storage::disk('public')->put($this->directory(), $params['background_image']);
      }

      $group->fill($params);
      $group->save();

      return $group;
  }

  public function editGroup($params, $id)
  {
      if(isset($params['background_image'])) {
        $params['background_image'] = Storage::disk('public')->put($this->directory(), $params['background_image']);
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
