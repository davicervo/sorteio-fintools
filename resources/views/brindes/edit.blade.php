@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <form method="POST" action="atualizar" enctype="multipart/form-data">

                @csrf
                @method('patch')

                @include('messages')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $brinde->nome }}" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="5" name="descricao">{{ $brinde->descricao }}</textarea>
                </div>

                <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="file" class="form-control-file" id="imagem" name="imagem">
                </div>

                <a href="{{route('brindes.index')}}" class="btn btn-secondary"><< Voltar</a>
                <button type="submit" class="btn btn-primary float-right">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection