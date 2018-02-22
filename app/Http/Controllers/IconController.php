<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Icon;
use App\Repositories\IconRepository;
use App\Validators\IconValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class IconController extends Controller
{
  protected $iconRepository;
  protected $validator;

  public function __construct(IconRepository $iconRepository, IconValidator $validator)
  {
    $this->iconRepository = $iconRepository;
    $this->validator = $validator;
  }


  public function index()
  {
    return $this->iconRepository->get();
  }


  public function store(Request $request)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

      $icon = $this->iconRepository->create($request->all());
      $response = [
        'message' => 'Icon created'
      ];
      return response()->json($response, 201);

    } catch (ValidatorException $e) {
      return response()->json([
        'error'   => true,
        'message' => $e->getMessageBag()
      ]);
    }
  }


  public function show(Icon $icon)
  {
    return response()->json($icon);
  }


  public function update(Request $request, $id)
  {
    try {
      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

      $icon = $this->iconRepository->editIcon($request->all(), $id);
      $response = [
        'message' => 'Icon updated',
        'data' => $icon
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
    $deleted = $this->iconRepository->delete($id);
    return response()->json([
      'message' => 'Icon deleted',
      'deleted' => $deleted,
    ]);
  }
}
