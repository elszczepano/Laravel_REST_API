<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Entities\User;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Storage;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
  public function createUser($params)
  {
    $user = new User();
    $params['password'] = bcrypt($params['password']);
    if(isset($params['avatar'])) {
      $params['avatar'] = Storage::disk('public')->put('avatars', $params['avatar']);
    }
    $user->fill($params);
    $user->save();

    return $user;
  }


  public function editUser($params, $id)
  {
    $params['password'] = bcrypt($params['password']);
    if(isset($params['avatar'])) {
      $params['avatar'] = Storage::disk('public')->put('avatars', $params['avatar']);
    }
    $user = $this->update($params, $id);
    return $user;
  }

  public function model()
  {
    return User::class;
  }

  public function boot()
  {
    $this->pushCriteria(app(RequestCriteria::class));
  }

}
