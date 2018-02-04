@extends('layout')

@section('content')

  {!! Form::open(['route' => 'posts.store']) !!}

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
  @endif

  <div>
    {!! Form::label('content', "Content:") !!}
    {!! Form::textarea('content', null) !!}
  </div>

  <div>
    {!! Form::submit('Add') !!}
    {!! link_to(URL::previous(), 'Undo') !!}
  </div>

  {!! Form::close() !!}

@endsection
