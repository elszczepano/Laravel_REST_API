<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::group([
  'middleware' => 'roles',
  'roles' => 'Admin'
], function() {
  Route::get('edit-group',[
    'uses' => 'EditGroupController@index',
    'as' => 'edit-group.index'
  ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
