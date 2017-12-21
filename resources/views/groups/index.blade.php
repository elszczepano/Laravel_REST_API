@extends('layout')

@section('content')

  @foreach ($groups as $group)
    <p>{{ $group->name }}</p>
  @endforeach

@endsection
