<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div id="app">
        @guest 
             
        <nav class="navbar  navbar-custom navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="/"><img src="/img/PHizzaHut.svg" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                    </li>

                </ul>
                </div>
            </div>
        </nav>
                    
        @endguest
        @auth
            
       
        @if(Auth::user()->role==1)
        <nav class="navbar  navbar-custom navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="/"><img src="/img/PHizzaHut.svg" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="/login">View Transaction History</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/register">View Cart</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
    
                            </div>
                          </div>
                    </li>

                </ul>
                </div>
            </div>
        </nav>
        @elseif(Auth::user()->role==2)
        <nav class="navbar  navbar-custom navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="/"><img src="/img/PHizzaHut.svg" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="/login">View All User Transaction</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/register">View All User</a>
                    </li>
                    <li class="nav-item">
                    {{-- <a class="nav-link" href="/register">{{ Auth::user()->name }}</a> --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          {{-- <a class="dropdown-item" href="#">Logout</a> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </div>
                      </div>
                    </li>

                </ul>
                </div>
            </div>
        </nav>
        @endif
        @endauth
        

    

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
