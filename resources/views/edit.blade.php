@extends('layouts.app-second')

@section('content')

<select>
  @foreach($roles as $role)
      <option value="{{$role->id}}"/>{{$role->name}}</option>
  @endforeach
</select>
@endsection
