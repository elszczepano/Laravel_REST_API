<?php

use Illuminate\Http\Request;

Route::post('login', 'AuthController@login');
Route::post('register', 'UserController@store');

Route::group([
  'middleware' => 'auth.api'
], function() {

  Route::post('logout', 'AuthController@logout');
  Route::post('refresh', 'AuthController@refresh');
  Route::post('me', 'AuthController@me');

  Route::resources([
    'users' => 'UserController',
    'groups' => 'GroupController',
    'posts' => 'PostController',
    'icons' => 'IconController',
    'roles' => 'RoleController',
    'notifications' => 'NotificationController',
    'comments' => 'CommentController',
    'user-groups' => 'UserGroupsController',
    'votes' => 'VoteController'
  ]);

  Route::get('notification/user/{user}', 'NotificationController@userNotifications');
  Route::get('user/groups/{user}', 'UserController@userGroups');
  Route::get('group/users/{group}', 'GroupController@groupUsers');
  Route::get('group/posts/{group}', 'PostController@groupPosts');
  Route::get('user/posts/{user}', 'UserController@userPosts');
  Route::get('post/comments/{post}', 'PostController@postComments');
  Route::get('post/votes/{post}', 'PostController@postVotes');
  Route::get('user/votes/{user}', 'UserController@userVotes');
  Route::get('search/group', 'GroupController@searchGroups');
});
