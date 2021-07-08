@extends('frontend.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
<div id="carouselExampleControls carouselExampleIndicators"
    class="jumbotron p-4 p-md-5 text-white rounded bg-dark carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="col-md-6 px-0 carousel-item relative active">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold stretched-link">Continue
                    reading...</a></p>
        </div>
        <div class="col-md-6 px-0 carousel-item ">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold ">Continue
                    reading...</a></p>
        </div>
        <div class="col-md-6 px-0 carousel-item ">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold ">Continue
                    reading...</a></p>
        </div>
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
                <p class="card-text mb-auto">{{substr($product->description,0,70)}}</p>
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
    @endforeach

    {{-- @foreach ($products as $key=>$product)
@if ($key>=4 && $key<=7) <div class="col-md-6">

    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h5 class="mb-0">{{$product->name}}</h5>
    <div class="mb-1 text-muted">{{$product->created_at}}</div>
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
</div>
</div>

<main role="main" class="container">
    <a href="#"><img class="card-img-top mb-3" src="http://placehold.it/700x200" alt=""></a>
    <div class="row">
        <div class="col-md-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">Sample blog post</h2>
                <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

                <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap.
                    Basic typography, images, and code are all supported.</p>
                <hr>
                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus
                    mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere
                    consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                    <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong>
                        ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet
                    fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <h2>Heading</h2>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non
                    commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus,
                    porta ac consectetur ac, vestibulum at eros.</p>
                <h3>Sub-heading</h3>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <pre><code>Example code block</code></pre>
                <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod.
                    Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                <h3>Sub-heading</h3>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean
                    lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce
                    dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit
            </div><!-- /.blog-post -->


            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
            <div class="p-4 mb-3 bg-light rounded">
                <i class="fa fa-info-circle " style="float:right;font-size:25px"></i>
                <h4 class="font-italic">About</h4>

                <p class="mb-0">SHOP.COM is a new kind of shopping comparison site that offers the most
                    comprehensive shopping <b>experience</b> on the web. Our shopping experts h
                    ave drawn on their industry experience and insider <b>connections</b> to bring you the best
                    collection
                    of the stores you can't live without, and the brands and produ
                    cts you love - all in one place..</p>
            </div>


            <div class="col-md-12 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="http://placehold.it/460x700" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">Item One</a>
                        </h4>
                        <h5>$24.99</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                            aspernatur!</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">★ ★ ★ ★ ☆</small>
                    </div>
                </div>
            </div>

        </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->
@endsection