<?php

use Illuminate\Http\Request;

Route::resources([
  'user' => 'UserController',
  'group' => 'GroupController',
  'post' => 'PostController',
  'icon' => 'IconController',
  'role' => 'RoleController',
  'notification' => 'NotificationController',
  'comment' => 'CommentController',
  'user-groups' => 'UserGroupsController',
  'votes' => 'VotesController'
]);

Route::get('notification/user/{user}', 'NotificationController@userNotifications');
Route::get('user/group/{user}', 'UserController@userGroups');
Route::get('group/user/{group}', 'GroupController@groupUsers');
Route::get('post/group/{group}', 'PostController@groupPosts');
Route::get('user/post/{user}', 'UserController@userPosts');
Route::get('post/comment/{post}', 'PostController@postComments');
Route::get('post/vote/{post}', 'PostController@postVotes');
Route::get('user/vote/{user}', 'UserController@userVotes');
