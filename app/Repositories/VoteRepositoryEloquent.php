<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VoteRepository;
use App\Entities\Vote;

class VoteRepositoryEloquent extends BaseRepository implements VoteRepository
{
  public function createVote($params, $userId, $postId)
  {
    $vote = new Vote();
    $vote ->fill($params);
    $vote->user()->associate($userId);
		$vote->post()->associate($postId);
    $vote ->save();

    return $vote;
  }

  public function editVote($params, $id)
  {
    $vote  = $this->update($params, $id);
    return $vote;
  }

  public function model()
  {
    return Vote::class;
  }

  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
