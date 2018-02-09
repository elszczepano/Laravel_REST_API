<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
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
     * @param  PostsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return Post::create($request->all());

      return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostsRequest  $request
     * @param  Post $posts
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Post $post)
     {
       $post->update($request->all());

       return response()->json($post, 200);
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $posts
     * @return \Illuminate\Http\Response
     */
     public function delete(Post $post)
    {
       $post->delete();

       return response()->json(null, 204);
    }
}
