<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\JoinRequestsRepository;
use App\Entities\JoinRequests;
use App\Validators\JoinRequestsValidator;


class JoinRequestsRepositoryEloquent extends BaseRepository implements JoinRequestsRepository
{
  public function createJoinRequest($params, $userId, $groupId)
  {
    $joinRequest = new JoinRequests();
    $joinRequest->fill($params);
    $joinRequest->user()->associate($userId);
    $joinRequest->group()->associate($groupId);
    $joinRequest->save();

    return $joinRequest;
  }

  public function editJoinRequest($params, $id)
  {
    $joinRequest = $this->update($params, $id);

    return $joinRequest;
  }

  public function model()
  {
    return JoinRequests::class;
  }

  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
