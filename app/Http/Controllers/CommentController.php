<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return Comment::all();
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Comment $comment
  * @return \Illuminate\Http\Response
  */
  public function show(Comment $comment)
  {
    return $comment;
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Comment $comment
  * @return Response
  */
  public function edit(Comment $comment)
  {
    return $comment;
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Comment $comment
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Comment $comment)
  {
    $comment->update($request->all());

    return response()->json($comment, 200);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Comment $comment
  * @return \Illuminate\Http\Response
  */
  public function delete(Group $comment)
  {
    $comment->delete();

    return response()->json(null, 204);
  }
}
