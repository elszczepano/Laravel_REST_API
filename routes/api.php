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
  'votes' => 'VotesController'
]);

Route::get('notification/user/{user}', 'NotificationController@userNotifications');
Route::get('group/user/{user}', 'GroupController@userGroups');
Route::get('post/group/{group}', 'PostController@groupPosts');
Route::get('post/user/{user}', 'PostController@userPosts');
Route::get('post/comment/{post}', 'CommentController@postComments');
Route::get('post/vote/{post}', 'VoteController@postVotes');
Route::get('user/vote/{user}', 'VoteController@userVotes');
