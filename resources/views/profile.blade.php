@extends('layouts.app-second')

@section('content')
@foreach($users as $user)

        <tr>
          <td>{{$user->name}} </td>
        </tr>
@endforeach
@endsection
