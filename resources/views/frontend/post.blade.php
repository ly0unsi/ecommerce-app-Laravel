@extends('frontend.master')
@section('title')
<title>{{$post->title}}</title>
@endsection
@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/us_US/sdk.js#xfbml=1&version=v8.0"
    nonce="dQ6WwqMZ"></script>
<script>
    window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		  t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);
	  
		t._e = [];
		t.ready = function(f) {
		  t._e.push(f);
		};
	  
		return t;
	  }(document, "script", "twitter-wjs"));
</script>
<div class="row">
    <div class="card col-md-8 mt-1 img-padding-no relative">
        <img src="{{url("storage/".$post->image)}}" class=" card-img-top" alt="...">
        <div class="card-body">
            <h3 class="card-title">{{$post->title}}</h3>
            <p class="card-text">{!!$post->body!!}</p>
            <div class="col-12 mb-1">
                <b><i class="fa fa-share"></i> Share the article </b> <br>
                <div class="fb-share-button" data-href="{{url('article')}}/{{$post->slug}}" data-layout="button"
                    data-size="small">
                    Share</div>
                <span style="position:relative;top: 7px">
                    <a class="twitter-share-button" href="{{url('article')}}/{{$post->slug}}" data-size="small">
                        Tweet</a>
                </span>
                <script src="https://platform.linkedin.com/in.js" type="text/javascript">
                    lang: en_US
                </script>
                <script type="IN/Share" data-url="{{url('article')}}/{{$post->slug}}"></script>
            </div>
        </div>

    </div>

    <div class="col-md-4">
        <h3>Products for you</h3>
        @foreach ($products as $product)
        <div class="firma-card row">
            <div class="col-md-4 img-padding-no">
                <div>
                    <a href="#">
                        <img src="{{url('storage')}}/{{$product->image}}" alt="">
                    </a>
                </div>
            </div>
            <div style="margin-left:px" class="col-md-8">
                <div class="firma-aciklama card-body">
                    <h5>{{$product->name}}</h5>
                    <p class="card-text mb-auto">{{$product->subtitle}}</p>
                    <span style="font-size:50px;font-weight:100" class="mb text-muted">{{$product->price}}$</span>


                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection