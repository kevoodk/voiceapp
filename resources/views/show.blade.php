@extends('layouts.app-second')


@section('content')

@if (Auth::check())

<div class="title">
  <h1>
    Blog
  </h1>
</div>
<div class="divader">
  <img src="{{URL::asset('/img/line.png')}}">
</div>

<div class="paragraph">
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
    enim ad minim veniam, quis nostrud
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
      nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
      enim ad minim veniam, quis nostrud </p><br>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
        nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
        enim ad minim veniam, quis nostrud</p>
</div>

<div class="robot">
  <img src="{{URL::asset('/img/robot_v2.png')}}">
</div>
<div class="robot-text-block">
  <p></p>
</div>
<div class="back-stripe">
  <img src="{{URL::asset('/img/back-stripe.png')}}">
</div>
<div class="robot-text-block-2">
</div>

<div class="section-two">
  <div class="middle-banner">
    <div class="blog-text-title"><p>{{ $post->title }}</p></div>
  </div>
  <div class="blog-box">
    <div class="blog-left">
      <div class="blog-textarea"><p>{{ $post->body }}</p></div>
    </div>
    <div class="blog-right"><img src="{{ $post->image }}"/></div>
    <div class="blog-text-footer">
      <p>Comments</p>
      <div class="blog-text-comments">
        <form method="post" action="{{ route('comment.add') }}">
          @csrf
          <div class="form-group">
            <textarea type="text" placeholder="Add a comment" name="comment_body" class="form-control"></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
          </div>
          <button class="form-group" type="submit">Add</button>
        </form>
        @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
      </div>
    </div>
  </div>
</div>


@else
<h3 class="notloggedin">You need to log in. <a href="/login">Click here to login</a></h3>
@endif
@endsection
