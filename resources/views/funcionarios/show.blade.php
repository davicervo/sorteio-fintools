@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            Nome: <strong><a href="{{ route('funcionarios.show', $dados->funcionario_uid) }}">{{ $dados->nome }}</a></strong><br>
            Departamento: <strong>--</strong><br>
            Elegivel: <strong>{{ $dados->elegivel ? 'SIM' : 'NÃO' }}</strong>
            <br>
            <br>
            <a href="{{route('funcionarios.index')}}" class="btn btn-secondary float-left"><< Voltar</a>
        </div>
    </div>
</div>
@endsection
