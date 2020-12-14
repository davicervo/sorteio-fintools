@foreach($fields as $field)
@switch($field['type'])
@case('radio')
<div class="form-group">
    <label for="{{$field['name']}}">{{$field['label']}}</label><br>
    @foreach($field['options'] as $option)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="{{$field['name']}}" id="{{"{$option['name']}{$option['value']}"}}" value="{{$option['value']}}">
        <label class="form-check-label" for="{{"{$option['name']}{$option['value']}"}}">{{$option['label']}}</label>
    </div>
    @endforeach
</div>
@break
@case('select')
<div class="form-group">
    <label for="{{$field['name']}}">{{$field['label']}}</label>
    <select class="form-control" id="{{$field['name']}}" name="{{$field['name']}}">
        <option value="">Selecione</option>
        @foreach($field['options'] AS $option)
        <option value="{{ $option[$field['option_value']]}}" @if($option[$field['option_value']]==old($field['name'])) selected @endif>{{ $option[$field['option_name']] }}</option>
        @endforeach
    </select>
</div>
@break
@default
<div class="form-group">
    <label for="{{$field['name']}}">{{$field['label']}}</label>
    <input type="{{$field['type']}}" class="form-control" id="{{$field['name']}}" name="{{$field['name']}}" value="{{$field['name'] != "password" ? old($field['name']) : null }}">
</div>
@endswitch

@endforeach