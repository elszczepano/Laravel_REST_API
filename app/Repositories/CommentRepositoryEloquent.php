<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CommentRepository;
use App\Entities\Comment;

class CommentRepositoryEloquent extends BaseRepository implements CommentRepository
{
  public function createComment($params, $userId, $postId)
	{
		$comment = new Comment();
		$comment->fill($params);
		$comment->user()->associate($userId);
		$comment->post()->associate($postId);
    $comment->save();

    return $comment;
	}

	public function editComment($params, $id)
	{
		$comment = $this->update($params, $id);
    
		return $comment;
	}

  public function model()
  {
    return Comment::class;
  }


  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }
}
