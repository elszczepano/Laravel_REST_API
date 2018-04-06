<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Notification;
use App\Entities\User;
use App\Repositories\NotificationRepository;
use App\Validators\NotificationValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class NotificationController extends Controller
{
  protected $repository;
  protected $validator;

  public function __construct(NotificationRepository $repository, NotificationValidator $validator)
  {
    $this->repository = $repository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->repository->with('user')->get();
  }


  public function userNotifications(User $user)
  {
    return $user->notification()->with('user')->orderBy('created_at', 'desc')->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $notification = $this->repository->createNotification($request->all(), $request->get('user_id'));
      $response = [
        'message' => 'Notification created succesfully',
        'data' => $notification
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show($id)
  {
    return $this->repository->with('user')->get()->where('id','=',$id)->first();
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $notification = $this->repository->editNotification($request->all(), $id);
      $response = [
        'message' => 'Notification updated succesfully',
        'data' => $notification
      ];

      return response()->json($response);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function destroy($id)
  {
    $deleted = $this->repository->delete($id);
    return response()->json([
      'message' => 'Notification deleted succesfully',
      'deleted' => $deleted,
    ]);
  }
}
