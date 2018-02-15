<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;

class GroupController extends Controller
{
  public function index()
  {
    return $group = Group::all();
  }


  public function myGroups(User $user) {
    return $user->group()->get();
  }


  public function store(Request $request)
  {
    $group = Group::create($request->all());
    $group->user()->attach($request->get('user_id'));
    $group->role()->attach($request->get('role_id'));
    return response()->json($group, 201);
  }


  public function show(Group $group)
  {
    return response()->json($group);
  }


  public function update(Request $request, Group $group)
  {
    $group->update($request->all());

    return response()->json($group);
  }


  public function destroy(Group $group)
  {
    $group->delete();

    return response()->json(null, 204);
  }
}
