<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  public function login(Request $request)
  {
    $this->validateLogin($request);

    if ($this->attemptLogin($request)) {
      $user = $this->guard()->user();
      $user->generateToken();

      return response()->json([
        'data' => $user->toArray(),
      ]);
    }

    return $this->sendFailedLoginResponse($request);
  }

  public function logout(Request $request)
  {
    $user = Auth::guard()->user();

    if ($user) {
      $user->api_token = null;
      $user->save();
    }

    return response()->json(['data' => 'User logged out.'], 200);
  }
  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/home';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
}
