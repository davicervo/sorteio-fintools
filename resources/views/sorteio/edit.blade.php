@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.messages')
    <div class="row justify-content-center">
        <div class="col-sm-8">

            <form method="POST" action="{{route('sorteios.update', $sorteio->sorteio_uid)}}">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $sorteio->titulo }}">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="5" name="descricao">{{ $sorteio->descricao }}</textarea>
                </div>

                <div class="form-group">
                    <label for="data_sorteio">Data do sorteio</label>
                    <input type="date" class="form-control-file" id="data_sorteio" name="data_sorteio" value="{{ $sorteio->data_sorteio }}">
                </div>

                <a href="{{route('sorteios.index')}}" class="btn btn-secondary float-left showload"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg> Voltar</a>
                <button type="submit" class="btn btn-primary float-right showload">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection
