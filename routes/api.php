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

  Route::get('icon', 'IconController@index');
  Route::get('icon/{icon}', 'IconController@show');
  Route::post('icon', 'IconController@store');
  Route::put('icon/{icon}', 'IconController@update');
  Route::delete('icon/{icon}', 'IconController@delete');

  Route::get('role', 'RoleController@index');
  Route::get('role/{role}', 'RoleController@show');
  Route::post('role', 'RoleController@store');
  Route::put('role/{role}', 'RoleController@update');
  Route::delete('role/{role}', 'RoleController@delete');

  Route::get('notificataion', 'NotificationController@index');
  Route::get('notificataion/{notificataion}', 'NotificationController@show');
  Route::post('notificataion', 'NotificationController@store');
  Route::put('notificataion/{notificataion}', 'NotificationController@update');
  Route::delete('notificataion/{notificataion}', 'NotificationController@delete');

  Route::get('comment', 'CommentController@index');
  Route::get('comment/{comment}', 'CommentController@show');
  Route::post('comment', 'CommentController@store');
  Route::put('comment/{comment}', 'CommentController@update');
  Route::delete('comment/{comment}', 'CommentController@delete');

});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::middleware('auth:api')
->get('/user', function (Request $request) {
  return $request->user();
});
