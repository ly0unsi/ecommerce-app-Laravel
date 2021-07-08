<form action="{{url('search')}}" style="align-content: space-between" class="d-flex">
    <input type="text" value="{{$q ?? ''}}" class="form-control form-control-sm" name="q" id="exampleInputEmail1"
        aria-describedby="emailHelp" placeholder="Search">
    <button type="submit" class="btn btn-dark ml-1 mr-2 btn-sm"><i class="fa fa-search"></i></button>
</form>