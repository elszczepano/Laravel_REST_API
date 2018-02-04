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

Route::get('posts/create', [
  'uses' => 'PostsController@create',
  'as' => 'posts.create'
]);
Route::post('posts/store', [
  'uses' => 'postsController@store',
  'as' => 'posts.store'
]);
Route::get('posts/edit/{page}', [
  'uses' => 'postsController@edit',
  'as' => 'posts.edit'
]);
Route::put('posts/{page}', [
  'uses' => 'postsController@update',
  'as' => 'posts.update'
]);
Route::delete('posts/{page}', [
  'uses' => 'postsController@destroy',
  'as' => 'posts.delete'
]);

Route::resource('posts', 'PostsController');
Route::resource('groups', 'GroupsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
