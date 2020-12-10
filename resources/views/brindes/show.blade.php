@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">

            @if(!empty($brinde->imagem))
                <img class="img-fluid mx-auto d-block" src="{{ asset('imagens/brindes/'. $brinde->imagem) }}" title="{{ $brinde->nome }}"/>
            @endif

            <h1 class="text-center m-5"><a href="{{ route('brindes.show', $brinde->brinde_uid) }}">{{ $brinde->nome }}</a></h1>
            @if(!empty($brinde->created_by))
                <p>Criado por {{ $brinde->created_by }} em {{ \Carbon\Carbon::parse($brinde->created_at)->format("d/m/Y H:i") }}</p>
            @endif
            @if (!empty($brinde->deleted_at))
                <p>Removido por {{ $brinde->deleted_by }} em {{ \Carbon\Carbon::parse($brinde->deleted_at)->format("d/m/Y H:i") }}</p>
            @else
                <a href="{{ route('brindes.edit', $brinde->brinde_uid) }}">
                    <button type="button" class="btn btn-primary showload">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </button>
                </a>
                <a href="{{ route('brindes.destroy', $brinde->brinde_uid) }}">
                    <button type="button" class="btn btn-danger">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                    </button>
                </a>
            @endif

            <br>
            <br>

            <p>{{ $brinde->descricao }}</p>
            <p><strong>Sorteio</strong>: <a href="/sorteios/{{ $brinde->sorteio_uid }}/visualizar">{{ $brinde->sorteio->titulo }}</a></p>

            @if(!empty($brinde->funcionario_uid))
                <p><strong>Ganhador</strong>: <a href="/funcionarios/{{ $brinde->funcionario_uid }}/visualizar">Ganhador</a></p>
            @endif

            <p>
                <a href="{{route('brindes.index')}}" class="btn btn-secondary float-left showload"><< Voltar</a>
            </p>

        </div>
    </div>
</div>
@endsection
