<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth:api');
    }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return User::all();
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
    return User::create($request->all());

    return response()->json($user, 201);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\User $user
  * @return \Illuminate\Http\Response
  */
  public function show(User $user)
  {
    return $user;
  }
  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\User $user
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, User $user)
  {
    $user->update($request->all());

    return response()->json($user, 200);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\User $user
  * @return \Illuminate\Http\Response
  */
  public function delete(User $user)
  {
    $user->delete();

    return response()->json(null, 204);
  }
}
