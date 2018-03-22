<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SupportRepository;
use App\Entities\Support;
use App\Validators\SupportValidator;
use Illuminate\Support\Facades\Storage;

class SupportRepositoryEloquent extends BaseRepository implements SupportRepository
{
  public function directory()
  {
    $directory = Date('ym');
    return $directory;
  }

  public function editSupport($params, $id)
  {
    $role = $this->update($params, $id);
    return $role;
  }

  public function createSupport($params)
  {
    $support = new Support();
    if(isset($params['attachment'])) {
      $params['attachment'] = Storage::disk('public')->put($this->directory(), $params['attachment']);
    }
    $support->fill($params);
    $support->save();

    return $support;
  }

  public function model()
  {
    return Support::class;
  }


  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
