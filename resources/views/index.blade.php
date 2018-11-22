@extends('layouts.app-second')

@section('content')

@if (Auth::check())

<div class="title">
  <h1>
    Blog
  </h1>
</div>
<div class="divader">
  <img src="../img/line.png">
</div>

<div class="create-blog">
  <a class="nav-link" href="{{ route('post.create') }}">create a post</a>
</div>

@foreach($posts as $post)
  <div class="blog-box">
    <tr>
      <td>{{ $post->id }}</td>
      <td>{{ $post->title }}</td>
      <td>
        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Show Post</a>
      </td>
    </tr>
  </div>
  @endforeach

@else
<h3 class="notloggedin">You need to log in. <a href="/login">Click here to login</a></h3>
@endif


@endsection
