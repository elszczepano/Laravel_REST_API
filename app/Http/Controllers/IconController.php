<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Icon;
use App\Repositories\IconRepository;

class IconController extends Controller
{
  protected $iconRepository;

  public function __construct(IconRepository $iconRepository)
  {
    $this->iconRepository = $iconRepository;
  }


  public function index()
  {
    return $this->iconRepository->get();
  }


  public function store(Request $request)
  {
    $icon = $this->iconRepository->create($request->all());
    return response()->json($icon, 201);
  }


  public function show(Icon $icon)
  {
    return response()->json($icon);
  }


  public function update(Request $request, $id)
  {
    $icon = $this->iconRepository->update($request->all(), $id);
    $response = [
      'message' => 'Icon updated',
      'data' => $icon
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->iconRepository->delete($id);
    return response()->json([
      'message' => 'Icon deleted.',
      'deleted' => $deleted,
    ]);
  }
}
