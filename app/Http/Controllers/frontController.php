<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\MyCategory;
use App\Models\Product;
use App\Models\Socialink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use TCG\Voyager\Models\Post;

class frontController extends Controller
{
   public function index(){
       if(request()->category){
           $products=Product::with('categories')->whereHas('categories',function($query){
               $query->where('slug',request()->category);
           })->orderBy('pid','DESC')->paginate(6);
           $categories=MyCategory::all();
           $socialLinks=Socialink::all();
           $posts=Post::paginate(3);
           $sideAd=Ad::where('position','side')->first();
           $slideAd=Ad::where('position','slide')->first();
           return view('frontend.index',['products'=>$products ,'categories'=>$categories,'sideAd'=>$sideAd,'slideAd'=>$slideAd,'posts'=>$posts,'socialLinks'=>$socialLinks]);
       }else{
           $posts=Post::paginate(3);
           $socialLinks=Socialink::all();
           $sideAd=Ad::where('position','side')->first();
           $slideAd=Ad::where('position','slide')->first();
           $products=Product::with('categories')->orderBy('pid','DESC')->paginate(6);
           $categories=MyCategory::all();
           return view('frontend.index',['products'=>$products ,'categories'=>$categories,'sideAd'=>$sideAd,'slideAd'=>$slideAd,'posts'=>$posts,'socialLinks'=>$socialLinks]);
       }
       
   }
   public function viewProduct($slug){
    $socialLinks=Socialink::all();
    $product=Product::where('slug',$slug)->first();
    $sameProducts=Product::with('categories')->paginate(5);
    $categories=MyCategory::all();
       return view('frontend.product',['product'=>$product,'categories'=>$categories,'sameProducts'=>$sameProducts,'socialLinks'=>$socialLinks]);
   }
   public function search(){
       $q=request()->input('q');
       $categories=MyCategory::all();
       $socialLinks=Socialink::all();
       $products=Product::where('name','like','%'.$q.'%')
       ->orWhere('description','like','%'.$q.'%')
       ->paginate(6);
       $allProducts=Product::where('name','like','%'.$q.'%')
       ->orWhere('description','like','%'.$q.'%');
       if($q==''){
           Session::flash('error','Field should not be empty');
       }
       return view('frontend.search',['products'=>$products,'categories'=>$categories,'q'=>$q,'allProducts'=>$allProducts,'socialLinks'=>$socialLinks]);
   }
   public function viewPost($slug){
    $socialLinks=Socialink::all();
    $products=Product::with('categories')->orderBy('pid','DESC')->paginate(5);
    $post=Post::where('slug',$slug)->first();
    $categories=MyCategory::all();
       return view('frontend.post',['post'=>$post,'categories'=>$categories,'socialLinks'=>$socialLinks,'products'=>$products]);
   }
}
