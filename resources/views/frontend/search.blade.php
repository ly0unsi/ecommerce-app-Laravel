@extends('frontend.master')
@section('title')
<title>Results for:"{{$q}}"</title>
@endsection
@section('content')
@if ($q!="")
<div class="row mb-2">
    <div class="col-12">
        <h5 style="font-weight:600;color:rgb(136, 136, 136);font-size: 16px;">✔ {{$allProducts->count()}} result(s)
            for:"{{$q}}"</h5>
    </div>
    @foreach ($products as $product)
    <div class="col-md-6">
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 pt-2 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">
                    @foreach ($product->categories as $category)
                    {{$category->name}}
                    @endforeach
                </strong>
                <h5 class="mb-0">{{$product->name}}</h5>
                <div class="mb-1 text-muted">{{$product->created_at}}</div>
                <p class="card-text mb-auto">{{$product->subtitle}}</p>
                <b style="font-size:50px;font-weight:100" class="text-muted">{{$product->price}}$</b>
                <a href="{{url('product')}}/{{$product->slug}}" class="stretched-link btn btn-primary">
                    Check out
                </a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img height="250" width="200" src="{{asset('storage/'.$product->image)}}">
            </div>
        </div>
    </div>
    @endforeach

    {{-- @foreach ($products as $key=>$product)
@if ($key>=4 && $key<=7) <div class="col-md-6">

    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h5 class="mb-0">{{$product->name}}</h5>
    <div class=" mb-1 text-muted">{{$product->created_at}}</div>
    <p class="mb-auto">{{substr($product->description,0,70)}}</p>
    <b class="mb-1 text-muted">{{$product->price}}$</b>
    <a href="{{url('product')}}/{{$product->slug}}" class="stretched-link btn btn-primary">
        Check out
    </a>
</div>
<div class="col-auto d-none d-lg-block">
    <img src="{{$product->image}}" alt="">
</div>
</div>

</div>
@endif
@endforeach --}}
<div class="row ml-1 col-md-12" style="text-align: center;justify-content:center">
    {{ $products->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
</div>
</div>
</div>
@else
<h2>
    No product found !!
</h2>
@endif



@endsection