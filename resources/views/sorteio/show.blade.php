@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="w-100 overflow-auto">
                Título: <strong><a href="{{ route('sorteios.edit', ['sorteio' => $dados->sorteio_uid]) }}">{{ $dados->titulo }}</a></strong><br>
                Descrição: <strong>{!! nl2br($dados->descricao) !!}</a></strong><br>
                Data sorteio: <strong>{{ \Carbon\Carbon::parse($dados->data_sorteio)->format('d/m/Y') }}</a></strong><br>
                Ativo: <strong>{{ $dados->ativo ? 'Ativo' : 'Inativo' }}</a></strong><br>
            </div>
            <br>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Vencedor</th>
                        <th scope="col">Prêmio</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dados->brindes as $premio)
                    <tr>

                        <td>{{$premio->funcionario->nome ?? '--'}}</td>
                        <td>{{$premio->nome ?? '--'}}</td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="2">Não foram sorteados prêmios para este sorteio</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{route('sorteios.index')}}" class="btn btn-secondary float-left showload">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg> Voltar
            </a>
        </div>
    </div>
</div>
@endsection