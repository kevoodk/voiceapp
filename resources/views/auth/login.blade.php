@extends('layouts.app')

@section('content')
<div class="title">
  <h1>
    {{ __('Login') }}
  </h1>
</div>
<div class="divader">
  <img src="../img/line.png">
</div>
  <div class="card">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
        <div class="col-md-6">
          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        <div class="col-md-6">
          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
          <button id="login" type="submit" class="btn btn-primary">
            {{ __('Login') }}
          </button>
        </div>
      </div>
    </form>
</div>
<div class="robot">
  <img src="../img/robot.png">
</div>
<div class="robot-shadow">
  <img src="../img/shadow.png">
</div>
<div class="robot-text-block">
  <p></p>
</div>
@endsection
