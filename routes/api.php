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

Route::get('group/my-groups/{user}', 'GroupController@myGroups');
Route::get('posts/my-posts/{user}', 'PostController@myPosts');
