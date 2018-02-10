<?php

use Illuminate\Http\Request;
use App\User;

Route::group(['middleware' => 'auth:api'], function() {
  Route::get('user', 'UserController@index');
  Route::get('user/{user}', 'UserController@show');
  Route::post('user', 'UserController@store');
  Route::put('user/{user}', 'UserController@update');
  Route::delete('user/{user}', 'UserController@delete');

  Route::get('group', 'GroupController@index');
  Route::get('group/{group}', 'GroupController@show');
  Route::post('group', 'GroupController@store');
  Route::put('group/{group}', 'GroupController@update');
  Route::delete('group/{group}', 'GroupController@delete');

  Route::get('post', 'PostController@index');
  Route::get('post/{post}', 'PostController@show');
  Route::post('post', 'PostController@store');
  Route::put('post/{post}', 'PostController@update');
  Route::delete('post/{post}', 'PostController@delete');

});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::middleware('auth:api')
->get('/user', function (Request $request) {
  return $request->user();
});
