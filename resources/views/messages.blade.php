@if ($message = \Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <span>{{ $message }}</span>
    </div>
@endif
