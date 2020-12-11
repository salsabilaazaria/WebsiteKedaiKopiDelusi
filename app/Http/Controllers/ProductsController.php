<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;
use App\Product;
use App\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $category = Category::all();
        // $category = Category::find($products->category_id);

        return view('admin.productshow', [
            'products' => $products,
            'category' => $category
        ]);


    }

    public function create()
    {

        $products = Product::get();
        $category = Category::get();

        return view('admin.productcreate', [
                'products' => $products,
                'category' => $category
            ]);
    }

    public function store(Request $request)
    //BUAT STORE PRODUCT DI ADMIN
    {
       
        $this->validate($request, [
            'name'=>'required|unique:products',
            'category'=>'required|numeric',
            'description'=>'required',
            'price'=>'required|numeric|min:100',
            // 'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
            'image'=>'required'
            // 'image'=>'required|file|max:10000',
        ]);

     
        

        $image = $request->file('image')->getClientOriginalName();
       

        $name = $request->input('name');
        $category = $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');
      

        

        DB::insert('insert into products (category_id, name, description, price, image) values (?,?,?,?,?)'
        ,[$category, $name, $description, $price, $image]);

        // dd($image);
        $image2 = $request->file('image');

        // dd($image, $request);
        // $image_file = time()."_".$image->getClientOriginalName();
        $image_file = $image2->getClientOriginalName();
        
        // // $dest = base_path() . 'images';
        $dest = 'images';
        $image2->move($dest,$image_file);
        // // $imagefile->move($dest,$image);

            
        return redirect('add_product_show')->with('success', 'Data Added');
    }

    public function deleteProduct($id=null)
    {
        Product::where(['id'=>$id])->delete();
        return redirect()->back();
    }
}
