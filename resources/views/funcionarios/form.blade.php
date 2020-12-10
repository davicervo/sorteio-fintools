@foreach($fields as $field)
    @switch($field['type'])
        @case('radio')
        <div class="form-group">
            <label for="{{$field['name']}}">{{$field['label']}}</label><br>
            @foreach($field['options'] as $option)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="{{$field['name']}}"
                           id="{{$option['name']}}" value="{{$option['value']}}">
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
                   name="{{$field['name']}}"
                   value="{{$field['name'] != "password" ? old($field['name']) : null }}">
        </div>
    @endswitch

@endforeach
