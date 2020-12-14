@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">

            @include('messages')

            <form method="POST" action="{{route('usuarios.update', ['id' => $data->id])}}">
                @csrf
                @method('patch')

                @include('partials.form-constructor.edit')


                <a href="{{route('usuarios.index')}}" class="btn btn-secondary float-left showload">
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