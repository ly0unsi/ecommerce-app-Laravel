@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>My orders</h2>
            <div class="card">
                @foreach (Auth()->user()->orders as $order)
                <div class="card-header">
                    <b>date:</b>{{$order->payment_created_at}} <br>
                    <b>Amount:</b> {{($order->amount/100)}}$
                </div>

                <div class="card-body">
                    @foreach (unserialize($order->products) as $product)
                    <b>product name</b>: {{$product[0]}} <br>
                    <b>Price</b>: {{$product[1]}}$ <br>
                    <b>Quantity</b>: {{$product[2]}} <br>
                    @endforeach
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection