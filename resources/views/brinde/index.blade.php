@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Sorteio</th>
                    <th scope="col">Ganhador</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Remover</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($brindes as $brinde)
                        <tr>
                            <td><a href="{{ route('brindes.show', $brinde->brinde_uid) }}">{{ $brinde->nome }}</a></td>
                            <td>{{ $brinde->descricao }}</td>
                            <td>{{ $brinde->sorteio_uid }}</td>
                            <td>{{ $brinde->funcionario_uid }}</td>
                            <td><a href="{{ route('brindes.edit', $brinde->brinde_uid) }}">Editar</a></td>
                            <td><a href="{{ route('brindes.destroy', $brinde->brinde_uid) }}">Remover</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
