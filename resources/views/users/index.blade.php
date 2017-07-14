@extends('layouts.default')
@section('title','显示用户')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <h1>所有用户</h1>
  <ul class="users">
    @foreach ($users as $user)
      <li>
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
        <a href="{{ route('users.show', $user->id )}}" class="username">{{ $user->name }}</a>
      </li>
      @can('destroy', $user)
        <form action="{{ route('users.destroy', $user->id) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
        </form>
      @endcan
    @endforeach
  </ul>
  {!! $users->render() !!}
</div>
@stop
