<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;

class UserController extends Controller
{
  public function index()
  {
    return User::all();
  }


  public function groupUsers(Group $group)
  {
    return $group->user()->get();
  }


  public function store(Request $request)
  {
    $user = User::create($request->all());
    $user->group()->attach($request->get('group_id'));
    $user->role()->attach($request->get('role_id'));
    return response()->json($user, 201);
  }


  public function show(User $user)
  {
    return response()->json($user);
  }


  public function update(Request $request, User $user)
  {
    $user->update($request->all());

    return response()->json($user);
  }


  public function destroy(User $user)
  {
    $user->delete();

    return response()->json(null, 204);
  }
}
