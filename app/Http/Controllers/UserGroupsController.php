<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroups;

class UserGroupsController extends Controller
{
  public function index()
  {
    return UserGroups::all();
  }


  public function store(Request $request)
  {
    $userGroups = UserGroups::create($request->all());

    return response()->json($userGroups, 201);
  }


  public function show(UserGroups $userGroups)
  {
    return response()->json($userGroups);
  }


  public function update(Request $request, UserGroups $userGroups)
  {
    $userGroups->update($request->all());

    return response()->json($userGroups);
  }


  public function destroy(UserGroups $userGroups)
  {
    $userGroups->delete();

    return response()->json(null, 204);
  }
}
