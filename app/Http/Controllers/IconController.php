<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icon;

class IconController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return Icon::all();
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    return Icon::create($request->all());

    return response()->json($icon, 201);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Icon $icon
  * @return Response
  */
  public function edit(Icon $icon)
  {
    return $icon;
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Icon $icon
  * @return \Illuminate\Http\Response
  */
  public function show(Icon $icon)
  {
    return $icon;
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Icon $icon
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Icon $icon)
  {
    $icon->update($request->all());

    return response()->json($icon, 200);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Icon $icon
  * @return \Illuminate\Http\Response
  */
  public function delete(Icon $icon)
  {
    $icon->delete();

    return response()->json(null, 204);
  }
}
