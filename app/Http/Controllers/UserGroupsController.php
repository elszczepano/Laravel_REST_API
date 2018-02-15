<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroups;

class UserGroupsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return UserGroups::all();
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
    return UserGroups::create($request->all());

    return response()->json($Users, 201);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\UserGroups $UserGroups
  * @return \Illuminate\Http\Response
  */
  public function show(UserGroups $UserGroups)
  {
    return $UserGroups;
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\UserGroups $UserGroups
  * @return \Illuminate\Http\Response
  */
  public function edit(UserGroups $UserGroups)
  {
    return $UserGroups;
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\UserGroups $UserGroups
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, UserGroups $UserGroups)
  {
    $UserGroups->update($request->all());

    return response()->json($UserGroups, 200);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\UserGroups $UserGroups
  * @return \Illuminate\Http\Response
  */
  public function delete(UserGroups $UserGroups)
  {
    $UserGroups->delete();

    return response()->json(null, 204);
  }
}
