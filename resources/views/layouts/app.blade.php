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

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.12.4/sweetalert2.min.css" integrity="sha512-zEmgzrofH7rifnTAgSqWXGWF8rux/+gbtEQ1OJYYW57J1eEQDjppSv7oByOdvSJfo0H39LxmCyQTLOYFOa8wig==" crossorigin="anonymous" />

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style rel="stylesheet" type="text/css">
        .menuActive{background: #999999;color: white !important;border-radius: 10px;}
        .foto{margin-top: 10px;padding: 6px;border: 2px solid #A7A9AB;}
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @php
                    $routerCurrentName = \Route::current()->getName();
                @endphp
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link @if(strpos($routerCurrentName, 'home') !== false) menuActive @endif" href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(strpos($routerCurrentName, 'brindes.') !== false) menuActive @endif" href="#" id="brindesDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Brindes') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="brindesDropdown">
                                <a class="dropdown-item" href="{{ route('brindes.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('brindes.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(strpos($routerCurrentName, 'usuarios.') !== false) menuActive @endif" href="#" id="brindesDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Usuários
                            </a>
                            <div class="dropdown-menu" aria-labelledby="brindesDropdown">
                                <a class="dropdown-item" href="{{ route('usuarios.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('usuarios.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(strpos($routerCurrentName, 'sorteios.') !== false) menuActive @endif" href="#" id="sorteiosDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Sorteio') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="sorteiosDropdown">
                                <a class="dropdown-item" href="{{ route('sorteios.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('sorteios.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(strpos($routerCurrentName, 'funcionarios.') !== false) menuActive @endif" href="#" id="funcionariosDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Funcionarios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="funcionariosDropdown">
                                <a class="dropdown-item" href="{{ route('funcionarios.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('funcionarios.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(strpos($routerCurrentName, 'vencedor.') !== false) menuActive @endif" id="vencedores"
                               role="button"  aria-haspopup="true" aria-expanded="false" href="{{ route('vencedor.index') }}">
                                Vencedores
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.12.4/sweetalert2.all.min.js" integrity="sha512-MeYKISaW+aIBSw7vihX/0BKM2oN6poJwgxQGvq7hzXTBrEPVT1fv/o5f8n1ZYKJCt7XYUOgfZd4PaCcXQtRZ4w==" crossorigin="anonymous"></script>
    @yield('js')
    <script>
        $(document).ready(function () {
            $('.showload').on('click', function(){
                $(this).html('<i class="fas fa-spinner fa-pulse"></i>');
            });
        });
    </script>
</body>

</html>
