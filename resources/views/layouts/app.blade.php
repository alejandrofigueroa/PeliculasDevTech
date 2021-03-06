<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerLayout" aria-controls="navbarTogglerLayout" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerLayout">
            <a class="navbar-brand" href="#">Peliculas DevTech</a> 
            @auth
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/inicio') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    
                    @if(Auth::user()->rol == 'administrador')
                        <li>
                            <a class="nav-link" href="{{ route('peliculas.index') }}">Peliculas <span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('users.index') }}">Usuarios <span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('categorias.index') }}">Categorias <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                </ul>
                <ul class="d-flex my-2 my-lg-0">

                    <li class="nav-item dropdown ">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:white;">
                            {{ Auth::user()->usuario }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-outline-light ">Iniciar sesion</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-light ">Registrarse</a>
                    @endif
                </ul>
                        
            @endauth  
    </nav> 

    
    @yield('content')
    
    
</body>
</html>
