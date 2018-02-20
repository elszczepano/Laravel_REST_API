<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\User;
use App\Repositories\UserRepository;

class UserController extends Controller
{
  protected $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }


  public function index()
  {
    return $this->userRepository->get();
  }


  public function userGroups(User $user)
  {
    return $user->group()->get();
  }


  public function userPosts(User $user)
  {
    return $user->post()->get();
  }


  public function userVotes(User $user)
  {
    return $user->vote()->get();
  }
  

  public function store(Request $request)
  {
    //$user = $this->userRepository->createUser($request->all());
    //return response()->json($user, 201);
  }


  public function show(User $user)
  {
    return response()->json($user);
  }


  public function update(Request $request, $id)
  {
    $user = $this->userRepository->editUser($request->all(), $id);
    $response = [
      'message' => 'User updated',
      'data' => $user
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->userRepository->delete($id);
    return response()->json([
      'message' => 'Group deleted.',
      'deleted' => $deleted,
    ]);
  }
}
