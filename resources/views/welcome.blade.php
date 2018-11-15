<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,700" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/p5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/addons/p5.dom.js"></script>
        <script src="{{ URL::asset('js/lib/p5.speech.js') }}"></script>
        <script src="{{ URL::asset('js/voice.js') }}"></script>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container2">
          <div class="slogan">
            <h1>
              this is <span style="color: #0b0b49;">not</span><br>
              just another<br>
              website...
            </h1>
          </div>
          <div class="divader">
            <img src="../img/line.png">
          </div>
          <div class="robot">
            <img src="../img/robot.png">
          </div>
          <div class="robot-shadow">
            <img src="../img/shadow.png">
          </div>
          <div class="robot-text-block">
            <p></p>
          </div>
            @if (Route::has('login'))
                <div class="landing-nav">
                    <ul>
                      @auth
                          <li><a href="{{ url('/home') }}">Home</a></li>
                      @else
                          <li><a href="{{ route('login') }}">Login</a></li>
                          @if (Route::has('register'))
                          <li><a href="{{ route('register') }}">Register</a></li>
                          @endif
                      @endauth
                    </ul>
                </div>
            @endif
        </div>
    </body>
</html>
