@extends('frontend.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
@if ($products)


<div id="carouselExampleControls carouselExampleIndicators"
    class="jumbotron py-4 p-md-5 text-white rounded bg-dark carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">

        <div class="col-md-12 px-0 carousel-item relative active">

            @foreach ($products as $key=>$product)
            @if ($key==3)
            <div class="row">
                <div class="col-md-9">
                    <h1 class="display-4 font-italic">{{$product->name}}</h1>
                    <p style="color: white" class="lead my-3">{!!$product->description!!}</p>
                    <p class="lead mb-0"><a href="{{url('product')}}/{{$product->slug}}"
                            class="text-white mt-2 font-weight-bold stretched-link">Continue
                            reading...</a></p>
                </div>
                <div style="text-align: center" class="col-md-3">
                    <img src="{{asset('storage/'.$product->image)}}" alt="">
                </div>
            </div>
        </div>
        @endif
        @endforeach

        @foreach ($products as $key=>$product)
        @if ($key==5)
        <div class="col-md-12 px-0 carousel-item relative">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="display-4 font-italic">{{$product->name}}</h1>
                    <p style="color: white" class="lead my-3">{!!$product->description!!}</p>
                    <p class="lead mb-0"><a href="{{url('product')}}/{{$product->slug}}"
                            class="text-white mt-2 font-weight-bold stretched-link">Continue
                            reading...</a></p>
                </div>
                <div style="text-align: center" class="col-md-3">
                    <img src="{{asset('storage/'.$product->image)}}" alt="">
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @foreach ($products as $key=>$product)
        @if ($key==6)
        <div class="col-md-12 px-0 carousel-item relative">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="display-4 font-italic">{{$product->name}}</h1>
                    <p class="lead my-3">{!!$product->description!!}</p>
                    <p class="lead mb-0"><a href="{{url('product')}}/{{$product->slug}}"
                            class="text-white mt-2 font-weight-bold stretched-link">Continue
                            reading...</a></p>
                </div>
                <div style="text-align: center" class="col-md-3">
                    <img src="{{asset('storage/'.$product->image)}}" alt="">
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</div>

<div class="row mb-2">
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
                <span style="font-size:50px;font-weight:100" class="mb text-muted">{{$product->price}}$</span>
                <a href="{{url('product')}}/{{$product->slug}}" class="stretched-link btn btn-primary">
                    <i class="fa fa-eye"></i>
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
@endif
<main role="main" class="container">
    <a href="#"><img class="card-img-top mb-3" src="storage/{{$slideAd->image}}" alt=""></a>
    <div class="row">
        <div class="col-md-8 blog-main">
            @foreach ($posts as $key=>$post)
            @if ($key==0)
            <div class="card pl-0 pr-0 relative col-md-12">
                <img src="storage/{{$post->image}}" class="card-img-top pl-0 pr-0" alt="...">
                <div class="card-body">
                    <h5 style="color: crimson" class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{!!substr($post->body,0,400)!!}</p>
                    <a href="{{url('post/'.$post->slug)}}" class="btn btn-danger stretched-link">Read more</a>
                </div>
            </div>
            @endif
            @endforeach
            <div class="row">
                @foreach ($posts as $key=>$post)
                @if ($key>=1 && $key<=2) <div class="card relative pl-1 pr-1 col-md-6">
                    <img src="storage/{{$post->image}}" class=" card-img-top" alt="...">
                    <div class="card-body">
                        <h5 style="color: crimson" class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{!!substr($post->body,0,400)!!}</p>
                        <a href="{{url('post/'.$post->slug)}}" class="btn btn-danger stretched-link">Read more</a>
                    </div>
            </div>
            @endif
            @endforeach
        </div>
        <div class="row mt-2 col-md-12" style="text-align: center;justify-content:center">
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>

    <!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
        <div class="p-4 mb-3 bg-light rounded">
            <i class="fa fa-info-circle " style="float:right;font-size:25px"></i>
            <h4 class="font-italic">About</h4>

            <p class="mb-0">{{setting('site.description')}}</p>
        </div>


        <div class="col-md-12 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="storage/{{$sideAd->image}}" alt=""></a>
                <div class=" card-body">
                    <h4 class="card-title">
                        <a style="color: crimson" href="#">{{$sideAd->title}}</a>
                    </h4>
                    <h5>$24.99</h5>
                    <p class="card-text">{!!$sideAd->body!!}</p>
                </div>
                <div class="card-footer">
                    <small style="color: crimson" class="text-muted">★ ★ ★ ★ ☆</small>
                </div>
            </div>
        </div>

    </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->
@endsection