<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Notification;
use App\Entities\User;
use App\Repositories\NotificationRepository;

class NotificationController extends Controller
{
  protected $notificationRepository;

  public function __construct(NotificationRepository $notificationRepository)
  {
    $this->notificationRepository = $notificationRepository;
  }


  public function index()
  {
    return $this->notificationRepository->get();
  }


  public function userNotifications(User $user)
  {
    return $user->notification()->get();
  }


  public function store(Request $request)
  {
    $notification = $this->notificationRepository->createNotification($request->all(), $request->get('user_id'));
    return response()->json($notification, 201);
  }


  public function show(Notification $notification)
  {
    return response()->json($notification);
  }


  public function update(Request $request, $id)
  {
    $notification = $this->notificationRepository->editNotification($request->all(), $id);
    $response = [
      'message' => 'Notification updated',
      'data' => $notification
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->notificationRepository->delete($id);
    return response()->json([
      'message' => 'Notification deleted.',
      'deleted' => $deleted,
    ]);
  }
}
