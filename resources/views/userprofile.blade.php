@extends('layouts.app-second')

@section('content')
<div class="title">
  <h1>
    Profile
  </h1>
</div>
<div class="divader">
  <img src="../img/line.png">
</div>

<div class="profile-block">
  <div class="profile-picture">
    <img src="/uploads/avatars/{{ $user->avatar }}">
    <form enctype="multipart/form-data" action="/userprofile" method="POST">
      <label>Update profile image</label>
      <input type="file" name="avatar">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button type="submit" name="button">Submit</button>
    </form>
  </div>
  <div class="profile-title">
    <h2>{{ Auth::user()->name }}'s profile</h2>
  </div>
</div>

<div class="robot">
  <img src="../img/robot_v2.png">
</div>
<div class="robot-text-block">
  <p></p>
</div>
<div class="back-stripe">
  <img src="../img/back-stripe.png">
</div>
<div class="robot-text-block-2">
</div>
@endsection
