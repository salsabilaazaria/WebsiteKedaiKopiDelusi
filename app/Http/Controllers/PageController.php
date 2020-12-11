<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subscription;
use Illuminate\Support\Facades\DB;
use Order;
use Auth;

class PageController extends Controller
{
   

    public function category(int $id){
//productcategory.blade.php
        $products = Product::where('category_id', $id)->paginate(3);
        $category = Category::find($id);
        $allcategory = Category::all();
        return view('productcategory', [
            'products' => $products,
            'category' => $category,
            'allcategory' => $allcategory
         
        ]);

    }
//PROFILE.BLADE.PHP
public function getprofile(){
    $orders = Auth::user()->orders;
    $user = Auth::user();
    $subscription = Auth::user()->subscriptions;

    $orders->transform(function($order,$key){
        $order->cart = unserialize($order->cart);
        return $order;
    });

    $subscription->transform(function($subs,$key){
        $subs->order = unserialize($subs->order);
        return $subs;
    });
  
    
    return view ('profile', ['orders'=>$orders, 'user'=>$user], ['subscription'=>$subscription]);
}
//SEARCH.BLADE.PHP
    public function search (Request $request){


        $query = $request->input('query');

        // $search = DB::table('products')->where('name', 'LIKE', '%'.$query.'%')->paginate(3);

        $search = Product::where('name', 'LIKE', '%'.$query.'%')->paginate(3);
        // $search->withPath('search/url');
        // $products = Product::where('name', 'LIKE', '%'.$query.'%')->get();

        return view('search')->with('product',$search);
    }
 


}
