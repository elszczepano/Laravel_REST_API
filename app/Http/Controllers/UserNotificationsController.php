<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserNotifications;

class UserNotificationsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return UserNotifications::all();
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
    return UserNotifications::create($request->all());

    return response()->json($Users, 201);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\UserNotifications $UserNotifications
  * @return \Illuminate\Http\Response
  */
  public function show(UserNotifications $UserNotifications)
  {
    return $UserNotifications;
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\UserNotifications $UserNotifications
  * @return \Illuminate\Http\Response
  */
  public function edit(UserNotifications $UserNotifications)
  {
    return $UserNotifications;
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\UserNotifications $UserNotifications
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, UserNotifications $UserNotifications)
  {
    $UserNotifications->update($request->all());

    return response()->json($UserNotifications, 200);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\UserNotifications $UserNotifications
  * @return \Illuminate\Http\Response
  */
  public function delete(UserNotifications $UserNotifications)
  {
    $UserNotifications->delete();

    return response()->json(null, 204);
  }
}
