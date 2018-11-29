<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/p5.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.4.5/addons/p5.dom.js"></script>
      <script src="{{ URL::asset('js/lib/p5.speech.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/custom-second.css') }}" rel="stylesheet">
</head>
<body>
  @guest
  <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
  </li>
  <li class="nav-item">
    @if (Route::has('register'))
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
  </li>
  @else
  <div class="username-logout">
    <nav id="navigation" class="site-navigation" role="navigation">
    <ul class="menu">
      <li class="nav-item">
        <a href="/home">Home</a>
      </li>
      <li class="menu-item">
        <a href="/about">About</a>
      </li>
      <li class="menu-item">
        <a href="/gallery">Gallery</a>
      </li>
      <li class="menu-item">
        <a href="/game">Game</a>
      </li>
      <li class="menu-item">
        <a href="/posts">Blog</a>
      </li>
      <li class="menu-item">
        <a href="/contacts">Contacts</a>
      </li>
      <li class="menu-item">
        <a>
          {{ Auth::user()->name }}&nbsp;<span><i class="fas fa-caret-down"></i></span>
        </a>
        <ul class="dropdown">
          <li class="menu-item sub-menu">
            <a id="logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>
      </li>
    </ul>
  </nav>
  </div>
  @endguest
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="{{ URL::asset('js/tetris.js') }}"></script>
</body>
</html>
