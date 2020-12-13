@extends('layouts.sorteio')

@section('content')
<div class="container-fluid">
    <div class="row no-gutters d-flex justify-content-center" ref="gridCards">
        <h2 class="card-title mt-2">{{$sorteio->titulo}} - Vencedores</h2>
        <table class="table" width="80%" style="margin: 50px 10% 0 10%">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Prêmio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td><img src="{{$item['funcionario']['foto']}}" alt="{{$item['funcionario']['nome']}}" style="border-radius: 50%;object-fit: cover;" width="70" height="70"></td>
                    <td>{{$item['funcionario']['nome']}}</td>
                    <td>{{$item['nome']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection