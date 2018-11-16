@extends('layouts.app')

@section('content')

<div id="score"></div>
<canvas id="tetris" width="240" height="400"></canvas>
    <script src="{{ URL::asset('js/tetris.js') }}"></script>
@endsection
