<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
      Posts::create($request->all());
      return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostsRequest  $request
     * @param  Posts $posts
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest  $request, Posts $posts)
    {
      $posts->update($request->all());
      return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
