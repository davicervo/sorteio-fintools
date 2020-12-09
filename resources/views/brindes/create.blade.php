@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">

            <form method="POST" action="salvar" enctype="multipart/form-data">
                @csrf

                @include('messages')

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="5" name="descricao">{{ old('descricao') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="file" class="form-control-file" id="imagem" name="imagem">
                </div>

                <a href="{{route('brindes.index')}}" class="btn btn-secondary float-left"><< Voltar</a>
                <button type="submit" class="btn btn-primary float-right">Criar</button>
            </form>
        </div>
    </div>
</div>
@endsection