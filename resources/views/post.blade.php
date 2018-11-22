@extends('layouts.app')

@section('content')
            <div class="title">
              <h1>
                Create a blog
              </h1>
            </div>
            <div class="divader">
              <img src="../img/line.png">
            </div>
            @if (Auth::check())

            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Post Title: </label>
                            <input type="text" name="title" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label class="label">Post Body: </label>
                            <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
            @else
            <h3 class="notloggedin">You need to log in. <a href="/login">Click here to login</a></h3>
            @endif
@endsection
