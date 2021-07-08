@extends('frontend.master')
@section('title')
<title>Payment</title>
@endsection
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('script')
<script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
<div class="col-md-12">
  <h3>Payment page</h3>
  <form id="payment-form" method="post" action="{{url('checkout')}}" class="col-md-6 mt-4">
    @csrf
    <div id="card-element">
      <!--Stripe.js injects the Card Element-->
    </div>
    <button id="submit" style="width:100%;font-weight:bold;margin-top:10px;" class="btn btn-dark">
      <div class="spinner hidden" id="spinner"></div>
      <span id="button-text"> <i class="fa fa-credit-card mr-2"></i>Pay ({{getPrice(Cart::total())}}$)</span>
    </button>
    <p id="card-error" role="alert"></p>

  </form>
</div>
@endsection
@section('js')
<script>
  var stripe = Stripe("pk_test_51HfpTjHGsOjvASJmqe3GZs5zbDlhNY7PHpUcaHHpmLg1NJ6qgRtTSRPuVySAE64cZKxx2axSEIiMRqw6IdObpWIW00NrTVwCy3");
    var elements = stripe.elements();
    var style = {
      base: {
        color: "#32325d",
        fontFamily: 'Arial, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "#32325d"
        }
      },
      invalid: {
        fontFamily: 'Arial, sans-serif',
        color: "#fa755a",
        iconColor: "#fa755a"
      }
    };
    var card = elements.create("card", { style: style });
    // Stripe injects an iframe into the DOM
    card.mount("#card-element");
    card.on("change", function (event) {
      // Disable the Pay button if there are no card details in the Element
      document.querySelector("button").disabled = event.empty;
      document.querySelector("#card-error").textContent = event.error ? event.error.message : "";
    });
    var form = document.getElementById("payment-form");
    var submitButton = document.getElementById("button-text");
    form.addEventListener("submit", function(event) {   
      event.preventDefault();
      submitButton.disabled=true;
      // Complete payment when the submit button is clicked
      
    
    stripe
    .confirmCardPayment("{{$clientSecret}}", {
      payment_method: {
        card: card,
      }
    })
    .then(function(result) {
      if (result.error) {
        // Show error to your customer
        // The payment succeeded!
        console.log('False');
        submitButton.disabled=false;
      } else {
        // The payment succeeded!
        var paymentIntent=result.paymentIntent;
        var url=form.action;
        var token=document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var redirect='merci';
        fetch(
          url,
          {
            headers:{
              "Content-Type":"application/json",
              "Accept":"application/json,text-plain,*/*",
              "X-Requested-With":"XMLHttpRequest",
              "X-CSRF-TOKEN":token
            },
            method:'post',
            body:JSON.stringify({
              paymentIntent:paymentIntent
            })
          }
        ).then((data)=>{
          console.log(data);
          window.location.href=redirect;
        }).catch((error)=>{
          console.log(error);
        })
      }
    });
   });
</script>
@endsection