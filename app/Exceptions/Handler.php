<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
  protected function unauthenticated($request, AuthenticationException $exception)
  {
    return response()->json(['error' => 'Unauthenticated'], 401);
  }

  protected $dontReport = [];

  protected $dontFlash = [
    'password',
    'password_confirmation',
  ];

  public function report(Exception $exception)
  {
    parent::report($exception);
  }


  public function render($request, Exception $exception)
  {
    if ($exception instanceof ModelNotFoundException) {
      return response()->json([
        'success' => false,
        'error' => 'Resource not found'
      ], 404);
    }
    if ($exception instanceof MethodNotAllowedHttpException) {
      return response()->json( [
        'success' => false,
        'message' => 'Method is not allowed for the requested route'
      ], 405 );
    }
    if ($exception instanceof NotFoundHttpException) {
      return response()->json( [
        'success' => false,
        'message' => 'Resource not found'
      ], 404 );
    }

    return parent::render($request, $exception);
  }
}
