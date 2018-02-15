<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserNotifications;

class UserNotificationsController extends Controller
{
  public function index()
  {
    return UserNotifications::all();
  }


  public function store(Request $request)
  {
    $userNotifications = UserNotifications::create($request->all());

    return response()->json($userNotifications, 201);
  }


  public function show(UserNotifications $userNotifications)
  {
    return response()->json($userNotifications);
  }


  public function update(Request $request, UserNotifications $userNotifications)
  {
    $userNotifications->update($request->all());

    return response()->json($userNotifications);
  }


  public function destroy(UserNotifications $userNotifications)
  {
    $userNotifications->delete();

    return response()->json(null, 204);
  }
}
