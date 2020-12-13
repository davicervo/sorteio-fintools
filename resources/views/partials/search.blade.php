@php
    $colunas = 4;
    $camposExtrasBusca = isset($camposExtrasBusca) ? $camposExtrasBusca : [];
    $col = empty($camposExtrasBusca) ? 10 : $colunas;
@endphp
<form action="" method="get">
    <div class="row">
        <div class="col-md-{{$col}}">
            <input type="text" name="search" class="form-control" value="{{request()->get('search')}}" placeholder="Busca...">
        </div>
        @foreach($camposExtrasBusca as $field)
            @php
                $colunas = !isset($field['col']) ? $colunas : $field['col'];
            @endphp
            @switch($field['type'])
                @case('radio')
                    <div class="col-md-{{$colunas}}">
                        <div>
                            <label class="label" for="{{$field['name']}}">{{$field['label']}}</label><br>
                            @foreach($field['options'] as $option)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="{{$field['name']}}"
                                           id="{{"{$field['name']}{$option['value']}"}}"
                                           @if(isset($field['defaultValue']) && $field['defaultValue'] == $option['value'] ) checked="checked" @endif
                                           value="{{$option['value']}}">
                                    <label class="form-check-label cursor-pointer"
                                           for="{{"{$field['name']}{$option['value']}"}}">{{$option['label']}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @break
                @default
                <div class="col-md-{{$colunas}}">
                    <div>
                        <label for="{{$field['name']}}">{{$field['label']}}</label>
                        <input type="{{$field['type']}}" class="form-control" id="{{$field['name']}}"
                               name="{{$field['name']}}"
                               value="{{$field['name'] != "password" ? old($field['name']) : null }}">
                    </div>
                </div>
            @endswitch
        @endforeach
        <div class="btn">
            <button class="btn btn-primary showload"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
