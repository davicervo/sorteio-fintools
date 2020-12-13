@extends('layouts.sorteio')

@section('content')
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12">
            <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                <img src="<?= asset('img/logo.png') ?>" width="250">
            </div>
            <div class="row justify-content-center align-items-center">
                @foreach($sorteios as $sorteio)
                <div class="col-md-4">
                    <div class="card" style="background: #ad0000; color: white;">
                        <div class="card-body">
                            <h5 class="card-title overflow-auto" style="height: 25px;">{{$sorteio->titulo}}</h5>
                            <p class="card-text overflow-auto" style="height: 70px;">{{$sorteio->descricao}}</p>
                            <div class="text-center">
                                <a href="{{route('sorteio',[$sorteio->sorteio_uid])}}" class="btn btn-light btn-lg mt-3">
                                    Ir para o Sorteio
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection