@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">

                @include('messages')

                <form method="POST" action="{{route('funcionarios.store')}}">
                    @csrf
                    @foreach($fields as $field)
                        @switch($field['type'])
                            @case('radio')
                            <div class="form-group">
                                <label for="{{$field['name']}}">{{$field['label']}}</label><br>
                                @foreach($field['options'] as $option)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="{{$field['name']}}"
                                               id="{{"{$option['name']}{$option['value']}"}}" value="{{$option['value']}}">
                                        <label class="form-check-label"
                                               for="{{"{$option['name']}{$option['value']}"}}">{{$option['label']}}</label>
                                    </div>
                                @endforeach
                            </div>
                            @break
                            @case('select')
                            <div class="form-group">
                                <label for="{{$field['name']}}">{{$field['label']}}</label>
                                <select class="form-control"
                                        id="{{$field['name']}}"
                                        name="{{$field['name']}}"
                                >
                                @foreach($field['options'] AS $option)
                                    <option value="{{ $option[$field['option_value']]}}"
                                        @if($option[$field['option_value']] == old($field['name']))
                                            selected
                                        @endif>{{ $option[$field['option_name']] }}</option>
                                @endforeach
                                </select>
                            </div>
                            @break
                            @default
                            <div class="form-group">
                                <label for="{{$field['name']}}">{{$field['label']}}</label>
                                <input type="{{$field['type']}}" class="form-control" id="{{$field['name']}}"
                                       name="{{$field['name']}}"
                                       value="{{$field['name'] != "password" ? old($field['name']) : null }}">
                            </div>
                        @endswitch

                    @endforeach

                    <a href="{{route('funcionarios.index')}}" class="btn btn-secondary float-left"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-double-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
  <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg> Voltar</a>
                    <button type="submit" class="btn btn-primary float-right">Criar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
