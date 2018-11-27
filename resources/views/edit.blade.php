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
<form action="{{ route('profile.destroy', $user->id) }}" method="POST">
    @method('DELETE')
    @csrf


<table>
@foreach($get_array as $test)
<tr>
<td>{{$get_array[$i]->slug}}</td>
<input type="hidden" name="roleid" value="{{$get_array[$i]->id}}"/>
<td><button>Remove</button></td>

</tr>

<?php
$i++;
?>
@endforeach
</table>
</form>
@endsection
