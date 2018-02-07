@extends('layout')

@section('content')

  @foreach ($posts as $post)
    <p>{{ $post->content }}</p>
  @endforeach

@endsection
