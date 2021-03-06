@extends('frontend.master')
@section('title')
<title>My card</title>
@endsection
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
@if (Cart::count()>0)
<div class="px-4 px-lg-0">

    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 bg-white rounded shadow-sm mb-5">

                    <!-- Shopping cart table -->
                    <div style="text-align:center" class="col-md-12">
                        <table class="table table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Remove</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $product)
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="{{asset('storage/'.$product->image)}} alt="" width=" 70"
                                                class="img-fluid rounded shadow-sm">

                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"> <a href="#"
                                                        class="text-dark d-inline-block align-middle">{{$product->name}}</a>
                                                </h5><span
                                                    class="text-muted font-weight-normal font-italic d-block">Category:
                                                    {{$product->category}}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>{{getPrice($product->subtotal)}}$</strong>
                                    </td>
                                    <td class="border-0 align-middle"><strong>

                                            <select name="qty" id="qty" data-id="{{$product->rowId}}"
                                                class="custom-select">
                                                @for ($i = 1; $i <= 5; $i++) <option value="{{$i}}"
                                                    {{$i==$product->qty ? 'selected':''}}>{{$i}}</option>
                                                    @endfor
                                            </select>
                                        </strong></td>
                                    <td class="border-0 align-middle">
                                        <form action="{{url('delete')}}/{{$product->rowId}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-dark" style="background: none;border:none">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>

            <div class="row py-5 pt-1 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-2 py-2 text-uppercase font-weight-bold">Coupon code</div>
                    <div class="pt-2">
                        <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                        <div class="input-group mb-4 border rounded-pill p-2">
                            <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3"
                                class="form-control border-0">
                            <div class="input-group-append border-0">
                                <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i
                                        class="fa fa-gift mr-2"></i>Apply coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller
                    </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">If you have some information for the seller you can leave them in
                            the box below</p>
                        <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you
                            have entered.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Subtotal
                                </strong><strong>{{getPrice(Cart::subtotal())}}$</strong>
                            </li>

                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Tax</strong><strong>{{getPrice(Cart::tax())}}$</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                    class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">{{getPrice(Cart::total())}}$</h5>
                            </li>
                        </ul><a href="{{url('payment')}}" class="btn btn-dark rounded-pill py-2 btn-block"><i
                                class="fa fa-credit-card"></i>Procceed to
                            checkout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@else
<div style="text-align: center;color:#343a40" class="col-md-12">
    <i class="fa fa-times-circle fa-5x"></i>
    <h3 style="font-weight:bold">No Product Found !!</h3>
</div>
@endif

@endsection
@section('js')
<script>
    var selects=document.querySelectorAll('#qty');
    Array.from(selects).forEach((element)=>{
        element.addEventListener('change',function(){
            var rowId=this.getAttribute('data-id');
            var token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch(
                `update/${rowId}`,
                {
                    headers:{
                       "Content-Type":"application/json",
                       "Accept":"application/json,text-plain,*/*",
                       "X-Requested-With":"XMLHttpRequest",
                       "X-CSRF-TOKEN":token
                    },
                    method:'patch',
                    body:JSON.stringify({
                        qty: this.value
                    })
                }
        
            ).then((data)=>{
                console.log(data);
                location.reload();
            
            }).catch((error)=>{
                console.log(error);
            })
        });
    });
</script>
@endsection