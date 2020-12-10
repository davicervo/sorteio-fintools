<form action="" method="get">
    <div class="row">
        <div class="col-md-10">
            <input type="text" name="search" class="form-control" value="{{request()->get('search')}}" placeholder="Busca...">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary showload"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
