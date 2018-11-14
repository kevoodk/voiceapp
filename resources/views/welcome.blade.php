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
        <div class="container">
            @if (Route::has('login'))
                <div class="bottom-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
