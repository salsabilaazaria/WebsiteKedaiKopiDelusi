

@extends('layouts.app')

@section('content')




<div class="container">
   
    <!-- FOREACH CATEGORY -->

    @foreach ($category as $c)
    <div class="row justify-content-center my-4">
        <a class="text-dark  " href="/Category/{{$c->id}}">
        <h1>  {{$c->name}}</h1>
        </a>           
    </div>
</div>
    <div class="row justify-content-center">
<div class="container">
    @foreach ($products->where('category_id', $c->id) as $product)

    @if($product->id==1||$product->id % 3 == 1)
    <div class="row justify-content-center">
        <div class="card-group">
        <!-- taro foreach disini -->
       
            <div class="card mr-4"><a href="/ProductDetails/{{$product->id}}">

                <img src="/images/{{$product->image}}" id ="productimg"class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-dark">{{$product->name}}</h5>
                    <p class="card-text text-dark">{{$product->description}}</p>
                    <p class="card-text text-dark">{{$product->price}}</p></a>

                </div>
            </div>
        <!-- </div> -->
        @else
        <!-- <div class="card-group"> -->
            <div class="card mr-4"><a href="/ProductDetails/{{$product->id}}">

                <img src="/images/{{$product->image}}" id ="productimg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title text-dark">{{$product->name}}</h5>
                <p class="card-text text-dark">{{$product->description}}</p>
                <p class="card-text text-dark">{{$product->price}}</p>
        
            </div></a>
           
        </div>
        
       
    </div> <br>
    @endif
    
    @endforeach
    @endforeach
</div>

    
   
  
  
</div>







@endsection
