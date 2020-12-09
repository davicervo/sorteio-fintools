@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">

            Nome: <a href="{{ route('brindes.show', $brinde->brinde_uid) }}">{{ $brinde->nome }}</a><br>
            Descrição: {{ $brinde->descricao }}<br>
            Sorteio: {{ $brinde->sorteio_uid }}<br>
            Ganhador: {{ $brinde->funcionario_uid }}<br>
            Imagem: <br>
            Criador: <br>
            Data de criação: <br>
            Data de atualização: <br>
            Data de remoção: <br>

        </div>
    </div>
</div>
@endsection
