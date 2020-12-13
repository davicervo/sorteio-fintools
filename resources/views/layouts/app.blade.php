<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="<?= asset('favicon.png') ?>" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <style rel="stylesheet" type="text/css">
        .menuActive {background: #999999;color: white !important;border-radius: 10px;}
        .foto {margin-top: 10px;padding: 6px;border: 2px solid #A7A9AB;width: 150px;height: 150px;}
        .pagination {justify-content: center;margin-top: 20px;}
        .section-search {margin-bottom: 20px;}
        .section-search form {padding: 10px 10px 10px 10px;background: #f2f2f2;}
        .section-search form label.label {margin:0;font-weight:600;cursor: pointer;}
        .section-search form input[type=text] {height: 45px;}
        .section-search div.btn {position: absolute;right: 30px;top: 7px;}
        .cursor-pointer {cursor: pointer;}
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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    @if(auth()->check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('home')) menuActive @endif" href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(request()->routeIs('sorteios.index')||request()->routeIs('sorteios.create')) menuActive @endif" href="#" id="sorteiosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Sorteio') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="sorteiosDropdown">
                                <a class="dropdown-item" href="{{ route('sorteios.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('sorteios.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(request()->routeIs('brindes.index') || request()->routeIs('brindes.create')) menuActive @endif" href="#" id="brindesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Prêmios') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="brindesDropdown">
                                <a class="dropdown-item" href="{{ route('brindes.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('brindes.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(request()->routeIs('usuarios.index')||request()->routeIs('usuarios.create')) menuActive @endif" href="#" id="brindesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Usuários
                            </a>
                            <div class="dropdown-menu" aria-labelledby="brindesDropdown">
                                <a class="dropdown-item" href="{{ route('usuarios.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('usuarios.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(request()->routeIs('departamentos.index')||request()->routeIs('departamentos.create')) menuActive @endif" href="#" id="departamentosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Departamentos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="departamentosDropdown">
                                <a class="dropdown-item" href="{{ route('departamentos.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('departamentos.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle @if(request()->routeIs('funcionarios.index')||request()->routeIs('funcionarios.create')) menuActive @endif" href="#" id="funcionariosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Funcionarios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="funcionariosDropdown">
                                <a class="dropdown-item" href="{{ route('funcionarios.index') }}">Listar</a>
                                <a class="dropdown-item" href="{{ route('funcionarios.create') }}">Criar</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs('vencedor.index')) menuActive @endif" id="vencedores" role="button" aria-haspopup="true" aria-expanded="false" href="{{ route('vencedor.index') }}">
                                Vencedores
                            </a>
                        </li>
                    </ul>
                    @endif

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
    @yield('js')
    <script>
        $(document).ready(function() {
            $('.showload').on('click', function() {
                $(this).html('<i class="fa fa-spinner fa-pulse"></i>');
            });
        });
    </script>
</body>

</html>
