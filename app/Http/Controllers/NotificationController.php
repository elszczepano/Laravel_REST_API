<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Entities\User;
use App\Repositories\NotificationRepository;

class NotificationController extends Controller
{
  public function index()
  {
    return Notification::all();
  }


  public function userNotifications(User $user)
  {
    return $user->notification()->get();
  }


  public function store(Request $request)
  {
    $notification = Notification::create($request->all());

    return response()->json($notification, 201);
  }


  public function show(Notification $notification)
  {
    return response()->json($notification);
  }


  public function update(Request $request, Notification $notification)
  {
    $notification->update($request->all());

    return response()->json($notification);
  }


  public function destroy(Notification $notification)
  {
    $notification->delete();

    return response()->json(null, 204);
  }
}
