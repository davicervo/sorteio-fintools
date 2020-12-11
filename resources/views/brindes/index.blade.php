@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 section-search">
            @include('partials.search')
        </div>
        <div class="col-sm-12">

            @include('messages')

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Descrição</th>
                    <th scope="col" class="text-center">Sorteio</th>
                    <th scope="col" class="text-center">Ganhador</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($brindes as $brinde)
                        <tr>
                            <td>
                                @if(!empty($brinde->imagem))
                                    <img class="img-thumbnail mx-auto d-block" width="100" height="100" src="{{ asset('imagens/brindes/'. $brinde->imagem) }}" title="{{ $brinde->nome }}"/>
                                @endif
                            </td>
                            <td class="align-middle"><a href="{{ route('brindes.show', $brinde->brinde_uid) }}">{{ $brinde->nome }}</a></td>
                            <td class="align-middle">{{ $brinde->descricao }}</td>
                            <td class="align-middle"><a href="/sorteios/{{ $brinde->sorteio_uid }}/visualizar">{{ $brinde->sorteio->titulo }}</a></td>
                            <td class="align-middle">{{ $brinde->funcionario_uid }}</td>
                            <td class="align-middle text-center">
                                <a href="{{ route('brindes.edit', $brinde->brinde_uid) }}">
                                    <button type="button" class="btn btn-primary showload">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </button>
                                </a>
                                <a data-action="{{ route('brindes.destroy', $brinde->brinde_uid) }}" @if(!$brinde->funcionario_uid) class="btn-delete" @endif>
                                    <button type="button" class="btn btn-danger" @if($brinde->funcionario_uid) disabled @endif>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <td colspan="6">
                    {{$brindes->withQueryString()->links()}}
                </td>
                </tfoot>
            </table>

        </div>
    </div>
</div>
@endsection
@section('js')
    @include('partials.confirm-delete')
@endsection
