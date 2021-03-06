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

  <div class="paragraph">
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
      nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
      enim ad minim veniam, quis nostrud
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
        nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
        enim ad minim veniam, quis nostrud </p>
  </div>

  <div class="robot">
    <img src="../img/robot_v2.png">
  </div>
  <div class="robot-text-block">
    <p></p>
  </div>
  <div class="back-stripe">
  </div>
  <div class="robot-text-block-2">
    <div class="text-block-center">
      <p id="robot-test"></p>
    </div>
  </div>

  <div class="create-blog">
    <a class="nav-link" href="{{ route('post.create') }}">create a post</a>
  </div>

  <div class="section-two">
    <div class="blog-box">
    @foreach($posts as $post)
          <div class="blog-card">
            <div class="blog-img"><img src="{{ $post->image }}"/></div>
            <div class="blog-title">
              <h6>{{ $post->title }}</h6>
            </div>
            <div class="blog-footer">
              <div class="blog-footer-left"><p>#{{ $post->id }}</p></div>
              <div class="blog-footer-right">
                <div class="read-more">
                  <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read more</a>
                </div>
              </div>
            </div>
          </div>
      @endforeach
      </div>
  </div>

@else
<h3 class="notloggedin">You need to log in. <a href="/login">Click here to login</a></h3>
@endif


@endsection
