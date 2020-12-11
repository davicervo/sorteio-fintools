@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            Nome: <strong><a href="{{ route('funcionarios.show', $dados->funcionario_uid) }}">{{ $dados->nome }}</a></strong><br>
            Departamento: <strong>{{ $dados->departamento->nome_exibicao ?? null }}</strong><br>
            Elegivel: <strong>{{ $dados->elegivel ? 'SIM' : 'NÃO' }}</strong><br>
            <div style="background-image: url({{ $dados->foto }}), url(<?= config('app.url') .'/'. config('picture.img_default')  ?>);background-position: center, center;background-repeat: no-repeat, no-repeat;background-size: cover, cover;" class="foto"></div>
            <br>
            <br>
            <a href="{{route('funcionarios.index')}}" class="btn btn-secondary float-left"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg> Voltar</a>
        </div>
    </div>
</div>
@endsection
