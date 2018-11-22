@extends('layouts.app-second')

@section('content')
<table>
  <tr>
    <th>Name</th>
    <th>Email</th>

  </tr>
@foreach($users as $user)

        <tr>
          <td>{{$user->name}} </td>
          <td>{{$user->email}}</td>
          <td><a href="{{ route('profile.edit', $user->id) }}">Edit</a>
        </tr>
@endforeach
</table>
@endsection
