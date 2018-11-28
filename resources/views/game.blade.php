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

<div class="paragraph">
  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
    nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
    enim ad minim veniam, quis nostrud
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
      nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
      enim ad minim veniam, quis nostrud </p>
</div>

<div class="robot">
  <img src="../img/robot_v2.png">
</div>
<div class="robot-text-block">
  <p></p>
</div>
<div class="back-stripe">
</div>
<div class="robot-text-block-2">
  <div class="text-block-center">
    <div class="text-block-center">
      <p id="robot-test"></p>
    </div>
  </div>
</div>

<div class="create-blog">
  <a>Start game</a>
</div>

<div class="score" id="score">0</div>
<canvas id="canvas" width="450" height="450"></canvas>

@endsection
