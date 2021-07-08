@extends('frontend.master')
@section('title')
<title>{{$product->name}}</title>
@endsection
@section('content')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
            efficiently about what’s most interesting in this post’s contents.</p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold ">Continue
                reading...</a></p>
    </div>
</div>
<div class="row mb-2">
    <div class="col-md-12">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
            style="height: auto">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary"> @foreach ($product->categories as $category)
                    {{$category->name}}
                    @endforeach</strong>
                <h5 class="mb-0">{{$product->name}}</h5>
                <div class="mb-1 text-muted">{{$product->created_at}}</div>
                <p class="card-text mb-1">{!!$product->description!!}</p>
                <span style="font-size:50px;font-weight:100" class="mb text-muted">{{$product->price}}$</span>
                <form method="POST" action="{{url('card/store')}}">
                    @csrf
                    <input type="hidden" name="pid" value="{{$product->pid}}">
                    <button class="col-md-12 btn btn-dark">
                        <i class="fa fa-shopping-cart"></i>
                        Add to card
                    </button>
                </form>
            </div>
            <div class="col-auto d-none d-lg-block" style="padding-top:0px;text-align:center">
                <img src="{{asset('storage/'.$product->image)}}" style="border-radius:5px " id="mainImage">
                <div class="col-md-12">
                    @if ($product->gallery)
                    @foreach (json_decode($product->gallery,true) as $image)
                    <img id="thumbnail" width="50" class="pointer" style="margin-top: 0.5em;margin-bottom: 0.5em;"
                        src="{{asset('storage/'.$image)}}">
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>


</div>
<h3>May also like</h3>
<div class="row" style="margin-left: 20px">
    @foreach ($sameProducts as $s)
    <div class="card col-md-2 text-white bg-dark mt-1 ml-1 mr-4 pl-1 pt-1 pr-1 ">
        <img class="card-img-top" height="170px" src="{{url('storage')}}/{{$s->image}}">
        <div class="card-body ">
            <div class="row">
                <h5 class="card-title">{{$s->name}}</h5>
            </div>
            <div class="row"> <span class="card-text">
                    {{$s->subtitle}}
                </span></div>
            <div class="row"> <span style="font-size:50px;font-weight:100" class="mb text-muted">{{$s->price}}$</span>
            </div>
            <div class="row"><a href="{{url('product')}}/{{$s->slug}}" class="btn btn-outline btn-dark stretched-link">
                    <i class="fa fa-eye"></i>
                    Chekeout</a></div>
        </div>
    </div>
    @endforeach
</div>


</div>
<div class="row ml-1 mt-2 col-md-12" style="text-align: center;justify-content:center">
    {{$sameProducts->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('js')
<script>
    var mainImage=document.getElementById('mainImage');
        var thumbnails=document.querySelectorAll('#thumbnail');
        thumbnails.forEach((element)=>element.addEventListener('click',changeImage));
        function changeImage(e){
            mainImage.src=this.src;
        }
</script>
@endsection