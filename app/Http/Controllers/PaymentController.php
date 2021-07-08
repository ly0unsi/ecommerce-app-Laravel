<?php

namespace App\Http\Controllers;

use DateTime;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Socialink;
use Stripe\PaymentIntent;
use App\Models\MyCategory;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count()<=0){
            return redirect('/');
        }
        Stripe::setApiKey('sk_test_51HfpTjHGsOjvASJmZQr8zwoGAAqOwJ02VIIvYcwLFx8iEw8MkijaDEjbd8QTGNQwUw9q5V2ccycuIawun0W9rJ4000x8BmtbFB');
        $paymentIntent = PaymentIntent::create([
            'amount' => round(Cart::total())*100,
            'currency' => 'usd',
           
          ]);
          $socialLinks=Socialink::all();
         $clientSecret=Arr::get($paymentIntent,'client_secret');
         $categories=MyCategory::all();
       return view('frontend.payment',['clientSecret'=>$clientSecret,'categories'=>$categories,'socialLinks'=>$socialLinks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->json()->all();
        $order=new Order();
        $order->payment_intent_id=$data['paymentIntent']['id'];
        $order->amount=$data['paymentIntent']['amount'];
        $order->payment_created_at=(new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('Y-m-d H:i:s');
        $products=[];
        $i=0;
        foreach(Cart::content() as $product){
            $products['product_'.$i][]=$product->name;
            $products['product_'.$i][]=$product->price;
            $products['product_'.$i][]=$product->qty;
            $i++;
        }
        $order->products=serialize($products);
        $order->user_id=Auth::user()->id;
        $order->save();
        if($data['paymentIntent']['status']==='succeeded'){
            Cart::destroy();
            return response()->json(['success','paymentIntent succeeded']);
        }else{
            return response()->json(['error','paymentIntent not succeeded']);
        }
       
    }
    public function merci(){
        $categories=MyCategory::all();
        $socialLinks=Socialink::all();
        return view('frontend.merci',['categories'=>$categories,'socialLinks'=>$socialLinks]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
