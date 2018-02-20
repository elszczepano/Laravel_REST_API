<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Vote;
use App\Repositories\VoteRepository;

class VoteController extends Controller
{
  protected $voteRepository;

  public function __construct(VoteRepository $voteRepository)
  {
    $this->voteRepository = $voteRepository;
  }


  public function index()
  {
    return $this->voteRepository->get();
  }


  public function store(Request $request)
  {
    $vote = $this->voteRepository->createVote($request->all(), $request->get('user_id'), $request->get('post_id'));
    return response()->json($vote, 201);
  }


  public function show(Vote $vote)
  {
    return response()->json($vote);
  }


  public function update(Request $request, $id)
  {
    $vote= $this->voteRepository->editVote($request->all(), $id);
    $response = [
      'message' => 'Vote updated',
      'data' => $vote
    ];

    return response()->json($response);
  }


  public function destroy($id)
  {
    $deleted = $this->voteRepository->delete($id);
    return response()->json([
      'message' => 'Vote deleted.',
      'deleted' => $deleted,
    ]);
  }
}
