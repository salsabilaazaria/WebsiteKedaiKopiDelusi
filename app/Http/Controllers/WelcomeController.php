<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

use Illuminate\Support\Facades\DB;


class WelcomeController extends Controller
{
    public function welcome(){

        return view('welcome');

    }
    public function product(){
      
        $products = Product::all();
        $category = Category::all();
   
        
        return view('order', [
            'products' => $products,
            'category' => $category
        ]);

    }
 
}
