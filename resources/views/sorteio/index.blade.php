@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.messages')
    <div class="row justify-content-center">
        <div class="col-sm-12">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Data do sorteio</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Remover</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($sorteios as $sorteio)
                        <tr>
                            <td><a href="{{ route('sorteios.show', $sorteio->sorteio_uid) }}">{{ $sorteio->titulo }}</a></td>
                            <td>{{ $sorteio->descricao }}</td>
                            <td>{{ $sorteio->data_sorteio }}</td>
                            <td>{{ $sorteio->isAtivo }}</td>
                            <td><a href="{{ route('sorteios.edit', $sorteio->sorteio_uid) }}">Editar</a></td>
                            <td><a href="{{ route('sorteios.destroy', $sorteio->sorteio_uid) }}">Remover</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{ $sorteios->links() }}

        </div>
    </div>
</div>
@endsection
