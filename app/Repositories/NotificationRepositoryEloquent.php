<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NotificationRepository;
use App\Entities\Notification;

class NotificationRepositoryEloquent extends BaseRepository implements NotificationRepository
{
  public function createNotification($params, $userId)
  {
    $notification = new Notification();
    $notification->fill($params);
    $notification->user()->associate($userId);
    $notification->save();

    return $notification;
  }

  public function editNotification($params, $id)
  {
    $notification = $this->update($params, $id);
    return $notification;
  }

  public function model()
  {
    return Notification::class;
  }

  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
