@extends('layouts.app-second')

@section('content')
<div class="title">
  <h1>
    Contact us!
  </h1>
</div>
<div class="divader">
  <img src="../img/line.png">
</div>

<form>
  <input type="text" id="name" name="contact-name" placeholder="Insert you name"/>
  <input type="email" id="email" name="contact-email" placeholder="Insert your email"/>
  <textarea style="width:100%;" name="question" cols="40" rows="5" id="question"></textarea>
  <button type="submit">Send question</button>
</form>
<!--<a href="geo:124.028582,-29.201930" target="_blank">Click here for map</a>-->
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
