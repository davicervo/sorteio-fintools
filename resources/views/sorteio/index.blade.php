@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.messages')
    <div class="row justify-content-center">
        <div class="col-sm-12 section-search">
            @include('partials.search')
        </div>
        <div class="col-sm-12 table-responsive">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th style="width: 50%;" scope="col">Descrição</th>
                        <th scope="col">Data do sorteio</th>
                        <th scope="col">Ativo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sorteios as $sorteio)
                    <tr>
                        <td><a href="{{ route('sorteios.show', $sorteio->sorteio_uid) }}">{{ $sorteio->titulo }}</a></td>
                        <td style="max-width: 80px;" class="overflow-auto">{!! nl2br($sorteio->descricao) !!}</td>
                        <td>{{ \Carbon\Carbon::parse($sorteio->data_sorteio)->format('d/m/Y') }}</td>
                        <td>{{ $sorteio->isAtivo }}</td>
                        <td>
                            <a href="{{ route('sorteios.edit', $sorteio->sorteio_uid) }}">
                                <button type="button" class="btn btn-primary showload">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                    </svg>
                                </button>
                            </a>
                            <a data-action="{{ route('sorteios.destroy', $sorteio->sorteio_uid) }}" class="btn-delete">
                                <button type="button" class="btn btn-danger">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                    </svg>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $sorteios->withQueryString()->links() }}

        </div>
    </div>
</div>
@endsection

@section('js')
@include('partials.confirm-delete')
@endsection