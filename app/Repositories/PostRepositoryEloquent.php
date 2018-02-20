<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostRepository;
use App\Entities\Post;

class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
  public function createPost($params, $userId, $groupId)
  {
    $post = new Post();
    $post->fill($params);
    $post->user()->associate($userId);
    $post->group()->associate($groupId);
    $post->save();
  }

  public function editPost($params, $id)
  {
    $post = $this->update($params, $id);
    return $post;
  }

  public function model()
  {
    return Post::class;
  }

  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
