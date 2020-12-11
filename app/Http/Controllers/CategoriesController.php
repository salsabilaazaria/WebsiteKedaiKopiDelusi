<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $category = Category::all();

        return view('admin.categoryshow', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('admin.categorycreate');
    }

    public function store(Request $request)
    {
       
        $this->validate($request, [
            'name'=>'required|unique:categories'
        ]);

        // $category = new Category([
        //     'name'=>$request->get('name')
        // ]);
        // $category->save();

        $name = $request->input('name');

        DB::insert('insert into categories (name) values (?)',[$name]);
            
        return redirect('add_category_show')->with('success', 'Data Added');
    }
}
