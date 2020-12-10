@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Prêmio</th>
                        <th scope="col">Sorteio</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vencedores as $vencedor)
                        <tr>
                            <td>{{ $vencedor->nome ?? '' }}</td>
                            <td>{{ $vencedor->brinde_nome ?? '' }}</td>
                            <td>{{ $vencedor->descricao ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
