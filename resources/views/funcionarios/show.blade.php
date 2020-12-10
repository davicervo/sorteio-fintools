@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            Nome: <strong><a href="{{ route('funcionarios.show', $dados->funcionario_uid) }}">{{ $dados->nome }}</a></strong><br>
            Departamento: <strong>{{ $dados->departamento->nome_exibicao }}</strong><br>
            Elegivel: <strong>{{ $dados->elegivel ? 'SIM' : 'NÃO' }}</strong><br>
            <img src="{{ $dados->foto }}" alt="{{ $dados->nome }}" class="foto"/>
            <br>
            <br>
            <a href="{{route('funcionarios.index')}}" class="btn btn-secondary float-left"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </div>
    </div>
</div>
@endsection
