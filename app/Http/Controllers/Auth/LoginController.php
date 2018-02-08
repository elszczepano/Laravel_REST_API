<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  public function login(Request $request) {
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
