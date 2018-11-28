@extends('layouts.app-third')

@section('content')
<div class="title">
  <h1>
    Game
  </h1>
</div>
<div class="divader">
  <img src="../img/line.png">
</div>

<div class="score" id="score">0</div>
<canvas id="canvas" width="450" height="450"></canvas>

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
  <p id="robot-test"></p>
</div>

@endsection
