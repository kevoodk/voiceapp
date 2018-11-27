@extends('layouts.app-second')

@section('content')
<h3>{{$user->name}}</h3>
<h3>{{$user->email}}</h3>

<form method="POST" action="{{ route('profile.store') }}">
 @csrf
<input type="hidden" name="user" value="{{$user->id}}"/>
<select name="role">
  @foreach($roles as $role)
      <option value="{{$role->id}}">{{$role->name}}</option>
  @endforeach
</select>

<button type="submit"/>submit</button>
</form>
<?php
$i = 0;
?>
@foreach($get_array as $test)

{{$get_array[$i]->slug}}
{{$get_array[$i]->role_id}}
<?php
$i++;
?>
@endforeach
@endsection
