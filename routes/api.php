<?php

use Illuminate\Http\Request;
use App\User;

Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@show');
Route::post('user', 'UserController@store');
Route::put('user/{id}', 'UserController@update');
Route::delete('user/{id}', 'UserController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
