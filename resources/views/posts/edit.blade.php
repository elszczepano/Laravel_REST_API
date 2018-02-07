@extends('layout')

@section('content')

  {!! Form::model($posts, ['route' => ['posts.update', $posts], 'method' => 'PUT']) !!}

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
  @endif

  <div>
    {!! Form::label('content', "Content:") !!}
    {!! Form::textarea('content', $posts->content, null) !!}
  </div>

  <div>
    {!! Form::submit('Edit') !!}
    {!! link_to(URL::previous(), 'Undo') !!}
  </div>

  {!! Form::close() !!}

@endsection
