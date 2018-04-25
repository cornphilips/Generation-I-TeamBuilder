<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- {{ config('app.name', 'TeamBuilder') }} -->
    <title>TeamBuilder</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- {{ config('app.name', 'TeamBuilder') }} -->
                    <img class="pokeball" src="">
                    TeamBuilder
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="/team">Team CRUD</a>
                                    <a class="dropdown-item" href="/team/create">Create Team</a>
                                    <a class="dropdown-item" href="/">Users CRUD</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script>

function firstLetterToUpper(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

jQuery(document).ready(function($) {

  var array = [
    "https://play.pokemonshowdown.com/sprites/itemicons/cherish-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/dive-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/dream-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/dusk-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/fast-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/friend-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/great-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/heal-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/heavy-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/level-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/light-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/love-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/lure-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/luxury-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/master-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/moon-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/nest-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/net-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/park-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/poke-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/premier-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/quick-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/repeat-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/safari-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/sport-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/timer-ball.png",
    "https://play.pokemonshowdown.com/sprites/itemicons/ultra-ball.png"
  ];

  var index = Math.floor((Math.random() * 27));
  $(".pokeball").attr("src", array[index]);

});



</script>

</html>
