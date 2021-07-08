<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Socialink;
use App\Models\MyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class cardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=MyCategory::all();
        $socialLinks=Socialink::all();
    return view('frontend.mycard',['categories'=>$categories,'socialLinks'=>$socialLinks]);
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
        
        $duplicata=Cart::search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id == $request->pid;
        });
        if($duplicata->isNotEmpty()){
            return redirect()->back()->with('success','Sorry the item is already added');
        }
        $product=Product::find($request->pid);
       Cart::add($product->pid,$product->name,1,$product->price)
       ->associate('card/store');
       return redirect('/')->with('success','the product added to card succesfully');
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
    public function update(Request $request, $rowId)
    {
        $data=$request->json()->all(); 
        Cart::update($rowId,$data['qty']);
        Session::flash('success','our product quantity bacome'+$data['qty']);
        return response()->json(['success'=>'Update succeeded']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('success','The product is deleted succesfully');
    }
}
