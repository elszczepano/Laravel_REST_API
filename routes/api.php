<?php

use Illuminate\Http\Request;
use App\User;

Route::get('user', 'UserController@index');
Route::get('user/{user}', 'UserController@show');
Route::post('user', 'UserController@store');
Route::put('user/{user}', 'UserController@update');
Route::delete('user/{user}', 'UserController@delete');

Route::post('register', 'Auth\RegisterController@register');

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
