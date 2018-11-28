@extends('layouts.app-second')

@section('content')
            <div class="title">
              <h1>
                Blog
              </h1>
            </div>
            <div class="divader">
              <img src="../img/line.png">
            </div>

            <div class="robot">
              <img src="{{URL::asset('/img/robot_v2.png')}}">
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

            <div class="paragraph">
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                enim ad minim veniam, quis nostrud
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                  nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                  enim ad minim veniam, quis nostrud </p>
            </div>

            <div class="create-blog">
              <a href="/posts">Back to blog</a>
            </div>

            <div class="section-two">
              @if (Auth::check())

              <div class="post-card">
                  <div class="card-header">Create Post</div>
                  <div class="card-body">
                      <form method="post" action="{{ route('post.store') }}">
                        <div class="form-left">
                          <div class="form-group">
                              <label class="label">Post Title: </label>
                              <textarea id="title" type="text" placeholder="Add a title" name="title" class="form-control" required></textarea>
                          </div>
                          <div class="form-group">
                              <label class="label">Post Body: </label>
                              <textarea id="question" name="body" placeholder="Start to write" rows="10" cols="30" class="form-control" required></textarea>
                              <button type="submit" class="btn btn-success">Post</button>
                          </div>
                        </div>
                        <div class="form-right">
                          @csrf
                          <div id="big-image">
                          </div>
                          <div class="thumbnail">
                            <div id="images">
                            </div>
                          </div>
                          <input type="hidden" name="image" id="getsrc"/>
                        </div>
                      </form>
                  </div>
              </div>
              @else
              <h3 class="notloggedin">You need to log in. <a href="/login">Click here to login</a></h3>
              @endif
            </div>
@endsection
