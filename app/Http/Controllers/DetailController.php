<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use App\Transaction;
use App\Order;
use App\Subscription;
use Auth;
use Session;

class DetailController extends Controller
{
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
    public function productdetail(int $id){
        //details.blade.php nampilin per item
        $product = Product::find($id);
        $category = Category::find($product->category_id);
        return view('details', [
            'product' => $product,
            'category' => $category
        ]);

    }
 


 

    public function cart(){
       //nampilin cartpage.blade.php nampilin isi cart
        if (!Session::has('cart')){
            return view('cartpage');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view ('cartpage', ['products' => $cart->items, 'totalPrice'=> $cart->totalPrice]);

    }
  

    public function getcheckout(){
        //nampilin checkout.blade.php nampilin form checkout
        if (!Session::has('cart')){
            return view('cartpage');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('checkout', ['products' => $cart->items,'total'=> $total]);
        
    }


    public function postcheckout(Request $request){
        //masukin data user di form checkout dan isi car ke table order dan subscription
    
        if (!Session::has('cart')){
            return view('cartpage');
        }

        $this->validate($request, [
            'name'=>'required',
            'address'=>'required',
            'deliverytype'=>'required',
            'ordertype'=>'required'
           
        ]);

      
    
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $address = $request->input('address');
        $deliverytype =$request->input('deliverytype');
        $payment=$request->input('payment');
        $ordertype=$request->input('ordertype');
  
        if($ordertype == "onetime"){
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $address;
        $order->deliverytype= $deliverytype;
        $order->payment= $payment;
      
        Auth::user()->orders()->save($order);
        
        }
        else{
            //masukin data ke subscription
            
            $deliverytime = $request->input('deliverytime');
            $duration = $request->input('duration');
            $subs = new Subscription();
            $subs->address = $address;
            $subs->deliverytype= $deliverytype;
            $subs->payment= $payment;
            $subs->duration=$duration;
            $subs->deliverytime = $deliverytime;
            $subs->order = serialize($cart);

            Auth::user()->subscriptions()->save($subs);

        }
        Session::forget('cart');

        return redirect()->route('welcome');
        
    }

    public function getAddToCart (Request $request, $id){
        //masukin item ke cart
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart -> add($product, $product->id);
       
        $request->session()->put('cart', $cart);
       
        return redirect()->route('welcome');
    }

    public function removeitem($id){

        //delete item dari cart
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        Session::put('cart', $cart);
        return redirect()->route('getcart');
    }

    public function updateitem(Request $request, $id ){
        //update qty di cart
       
        $query = $request->input('qty');
     
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateitem($query,$id);

        Session::put('cart', $cart);
        return redirect()->route('getcart');

    }

    




  
  
}
