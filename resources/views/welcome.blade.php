<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        .page {
            background: url('https://new.oliveiratrust.com.br/wp-content/themes/OliveiraTrust_WP/assets/img/fundo-marca-dagua-ot.png');
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
        }

        html,
        body {
            height: 100vh;
        }
    </style>
</head>

<body class="page">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                    <img src="https://oliveiratrust.com.br/portal/img/logo.png" width="250">
                </div>
                <div class="row justify-content-center align-items-center">
                    @foreach($sorteios as $sorteio)
                    <div class="col-md-4">
                        <div class="card" style="background: #ad0000; color: white;">
                            <div class="card-body">
                                <h5 class="card-title">{{$sorteio->titulo}}</h5>
                                <p class="card-text" style="height: 70px;overflow: auto;">{{$sorteio->descricao}}</p>
                                <div class="text-center">
                                    <a href="{{route('sorteio',[$sorteio->sorteio_uid])}}" class="btn btn-light btn-lg mt-3">Ir para o Sorteio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>