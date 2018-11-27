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

            @if (Auth::check())

            <div class="post-card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}">
                        <div class="form-group">
                            @csrf
                            <div id="big-image">
                            </div>
                            <div class="thumbnail">
                              <div id="images">
                              </div>
                            </div>
                            <input type="hidden" name="image" id="getsrc"/>
                            <label class="label">Post Title: </label>
                            <textarea type="text" placeholder="Add a title" name="title" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="label">Post Body: </label>
                            <textarea name="body" placeholder="Start to write" rows="10" cols="30" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Post</button>
                    </form>
                </div>
            </div>
            @else
            <h3 class="notloggedin">You need to log in. <a href="/login">Click here to login</a></h3>
            @endif

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
@endsection
