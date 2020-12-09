@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">

                @include('messages')

                <form method="POST" action="{{route('usuarios.update', ['id' => $data->id])}}">
                    @csrf
                    @method('patch')

                    @foreach($fields as $field)
                        @switch($field['type'])
                            @case('radio')
                            <div class="form-group">
                                <label for="{{$field['name']}}">{{$field['label']}}</label><br>
                                @foreach($field['options'] as $option)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{$field['name']}}"
                                               id="{{$option['name']}}" {{ $data[$field['name']] == $option['value'] ? 'checked' : null }}
                                               value="{{$option['value']}}">
                                        <label class="form-check-label"
                                               for="{{$option['name']}}">{{$option['label']}}</label>
                                    </div>
                                @endforeach
                            </div>
                            @break
                            @default
                            <div class="form-group">
                                <label for="{{$field['name']}}">{{$field['label']}}</label>
                                <input type="{{$field['type']}}" class="form-control" id="{{$field['name']}}"
                                       name="{{$field['name']}}" value="{{$field['name'] != "password" ? old($field['name']) ?? $data[$field['name']] : null}}">
                            </div>
                        @endswitch

                    @endforeach

                    <a href="{{route('usuarios.index')}}" class="btn btn-secondary float-left"><< Voltar</a>
                    <button type="submit" class="btn btn-primary float-right">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
