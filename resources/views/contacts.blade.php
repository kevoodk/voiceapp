@extends('layouts.app')

@section('content')

<h1 style="margin:0 auto; text-align:center;">Contact us!</h1>
<p style="margin:0 auto; text-align:center;">You can contact us here</p>
<form style="width:500px; margin:0 auto;">
  <input style="width:100%;"type="text" id="name" name="contact-name" placeholder="Insert you name"/>
  <input style="width:100%;" type="email" id="email" name="contact-email" placeholder="Insert your email"/>
  <textarea style="width:100%;" name="question" cols="40" rows="5" id="contact-question"></textarea>
  <button type="submit">Send question</button>
</form>

@endsection
