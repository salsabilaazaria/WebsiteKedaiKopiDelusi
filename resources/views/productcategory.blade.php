@extends('layouts.app')

@section('content')


<div class="container">
<br>
<div class="row my-4">
    <div class="col-2">
    <!-- FOREACH CATEGORY -->
        <h3>By Category</h3>
            <ul class="list-unstyled">
            @foreach ($allcategory as $c)
                <li class>
                 <a class="text-dark" href="/Category/{{$c->id}}">{{$c->name}}</a>
                </li>
            @endforeach
            </ul>
    
    </div>
    <div class="col-10">
    <h1>{{$category->name}}</h1>
        <div class="card-group">
        <!-- taro foreach disini -->
        @foreach ($products->where('category_id', $category->id) as $product)
            <div class="card"><a href="/ProductDetails/{{$product->id}}">
            
                <img src="/images/{{$product->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title text-dark">{{$product->name}}</h5>
                <p class="card-text text-dark">{{$product->description}}</p>
                <p class="card-text text-dark">{{$product->price}}</p>
        
            </div></a>
           
         </div>
        @endforeach
       
    </div> <br>

    <div class="align-self-end">{{$products->links()}}</div>
    
   
  </div>
  
</div>


@endsection


