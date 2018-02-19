<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icon;
use App\Repositories\IconRepository;

class IconController extends Controller
{
  public function index()
  {
    return Icon::all();
  }


  public function store(Request $request)
  {
    $icon = Icon::create($request->all());

    return response()->json($icon, 201);
  }


  public function show(Icon $icon)
  {
    return response()->json($icon);
  }


  public function update(Request $request, Icon $icon)
  {
    $icon->update($request->all());

    return response()->json($icon);
  }


  public function destroy(Icon $icon)
  {
    $icon->delete();

    return response()->json(null, 204);
  }
}
