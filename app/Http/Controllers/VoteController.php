<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Vote;
use App\Entities\Post;
use App\Entities\User;
use App\Repositories\VoteRepository;

class VoteController extends Controller
{
    public function index()
    {
        return Vote::all();
    }


    public function postVotes(Post $post)
    {
      return $post->vote()->get();
    }


    public function userVotes(User $user)
    {
      return $user->vote()->get();
    }


    public function store(Request $request)
    {
      $vote = Vote::create($request->all());

      return response()->json($vote, 201);
    }


    public function show(Vote $vote)
    {
      return response()->json($vote);
    }


    public function update(Request $request, Vote $vote)
    {
      $vote->update($request->all());

      return response()->json($vote);
    }


    public function destroy(Vote $vote)
    {
      $vote->delete();

      return response()->json(null, 204);
    }
}
