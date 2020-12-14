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
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') ?? $brinde->nome }}">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="5" name="descricao">{{ old('descricao') ?? $brinde->descricao }}</textarea>
                </div>

                <div class="form-group">
                    <label for="sorteio">Sorteio</label>
                    <select class="custom-select" name="sorteio">
                        <option value="">Selecione</option>
                        @foreach($sorteios as $sorteio)
                        <option value="{{ $sorteio->sorteio_uid  }}" <?= (((old('sorteio') ?? $brinde->sorteio->sorteio_uid) === $sorteio->sorteio_uid) ? 'selected' : '') ?>>{{ $sorteio->titulo }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">

                    @if(!is_null($brinde->imagem))
                    <div class="img-thumbnail">
                        <img width="100" height="100" src="{{ $brinde->imagem_url }}" />
                    </div>
                    @endif

                    <label for="imagem">Imagem</label>
                    <input type="file" class="form-control-file" id="imagem" name="imagem" accept="image/*">
                </div>

                <a href="{{route('brindes.index')}}" class="btn btn-secondary showload">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg>
                    Voltar
                </a>
                <button type="submit" class="btn btn-primary float-right showload">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection