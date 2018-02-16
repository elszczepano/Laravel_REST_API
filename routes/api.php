<?php

use Illuminate\Http\Request;

Route::resources([
  'user' => 'UserController',
  'group' => 'GroupController',
  'post' => 'PostController',
  'icon' => 'IconController',
  'role' => 'RoleController',
  'notification' => 'NotificationController',
  'comment' => 'CommentController'
]);

Route::get('notification/user/{user}', 'NotificationController@userNotifications');
Route::get('group/user/{user}', 'GroupController@userGroups');
Route::get('post/group/{group}', 'PostController@groupPosts');
Route::get('posts/user/{user}', 'PostController@myPosts');
