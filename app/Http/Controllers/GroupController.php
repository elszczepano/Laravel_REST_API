<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $group = Group::all();

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
    return Group::create($request->all());

    return response()->json($group, 201);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Group $group
  * @return \Illuminate\Http\Response
  */
  public function show(Group $group)
  {
    return $group;
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Group $group
  * @return Response
  */
  public function edit(Group $group)
  {
    return $group;
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Group $group
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Group $group)
  {
    $group->update($request->all());

    return response()->json($group, 200);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Group $group
  * @return \Illuminate\Http\Response
  */
  public function delete(Group $group)
  {
    $group->delete();

    return response()->json(null, 204);
  }
}
