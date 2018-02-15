<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
  public function index()
  {
    return Comment::all();
  }


  public function store(Request $request)
  {
    $comment = Comment::create($request->all());

    return response()->json($comment, 201);
  }


  public function show(Comment $comment)
  {
    return response()->json($comment);
  }


  public function update(Request $request, Comment $comment)
  {
    $comment->update($request->all());

    return response()->json($comment);
  }


  public function destroy(Group $comment)
  {
    $comment->delete();

    return response()->json(null, 204);
  }
}
