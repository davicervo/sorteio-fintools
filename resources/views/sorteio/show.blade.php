@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            Título: <strong><a href="{{ route('sorteios.edit', ['sorteio' => $dados->sorteio_uid]) }}">{{ $dados->titulo }}</a></strong><br>
            Descrição: <strong>{{ $dados->descricao }}</a></strong><br>
            Data sorteio: <strong>{{ \Carbon\Carbon::parse($dados->data_sorteio)->format('d/m/Y') }}</a></strong><br>
            Ativo: <strong>{{ $dados->ativo ? 'Ativo' : 'Inativo' }}</a></strong><br>
            <br>
            <br>
            <a href="{{route('sorteios.index')}}" class="btn btn-secondary float-left showload"><< Voltar</a>
        </div>
    </div>
</div>
@endsection
