@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            Nome: <strong><a href="{{ route('usuarios.show', $dados->id) }}">{{ $dados->name }}</a></strong><br>
            Email: <strong>{{ $dados->email }}</strong><br>
            email: <strong>{{ $dados->email }}</strong><br>
            senha: <strong>********</strong><br>
            Admin: <strong>{{ $dados->is_admin ? 'SIM' : 'NÃO' }}</strong>
            <br>
            <br>
            <a href="{{route('usuarios.index')}}" class="btn btn-secondary float-left"><< Voltar</a>
        </div>
    </div>
</div>
@endsection
