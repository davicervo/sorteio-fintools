@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.messages')
    <div class="row justify-content-center">
        <div class="col-sm-8">

            <form method="POST" action="{{route('sorteios.store')}}">
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" rows="5" name="descricao">{{ old('descricao') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="data_sorteio">Data do sorteio</label>
                    <input type="date" class="form-control-file" id="data_sorteio" name="data_sorteio">
                </div>

                <a href="{{route('sorteios.index')}}" class="btn btn-secondary float-left showload"><i class="fas fa-angle-double-left"></i> Voltar</a>
                <button type="submit" class="btn btn-primary float-right showload">Criar</button>
            </form>
        </div>
    </div>
</div>
@endsection
