@extends('layouts.app-second')

@section('content')
<h3>{{$user->name}}</h3>
<h3>{{$user->email}}</h3>
<form>
<p>{{$user->id}}</p>
<select>
  @foreach($roles as $role)
      <option value="{{$role->id}}"/>{{$role->name}}</option>
  @endforeach
</select>

</form>
@endsection
