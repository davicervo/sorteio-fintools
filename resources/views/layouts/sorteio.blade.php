<!DOCTYPE html>
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

    <style>
        .page {
            background: url('<?= asset('img/fundo-marca-dagua-ot.png') ?>');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            height: 100vh;
        }
        .sombra{
            -webkit-box-shadow: -1px -4px 24px 0 rgba(255,128,128,0.75);
            -moz-box-shadow: -1px -4px 24px 0 rgba(255,128,128,0.75);
            box-shadow: -1px -4px 24px 0 rgba(255,128,128,0.75);
            border: none;
            position: fixed; top: 10px; right: 20px;
        }
        .sombra span{border: none;}
        .sombra .icon{background: #ad0000;margin-right: -10px;}
        .sombra .text{background: #e60000;}

        .sombra:hover .icon i{
            transition: transform 500ms;
            transform: translateX(-5px) scale(1.5);
        }

        html,
        body {
            height: 100vh;
        }
    </style>

    @yield('css')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="page">
    @yield('content')
    @yield('js')
</body>

</html>
