@extends('layouts.app')

@section('content')
<div class="container">

<div class="row p-5">
        <div class="col">
            <img src="/images/{{$product->image}}" alt="product" class="active" id="currentImageDetail">
        </div>
        <div class="col p-4 bg-light">
            <br><br><br>
            <h1 class="mt-4 product-section-title">{{$product->name}}</h1>
            <br>
            <div class="product-section-subtitle">{{$product->description}}</div>
            <br>
            <div class="product-section-price">Rp.{{$product->price}}</div>

        

            <p>&nbsp;</p>
            


             
               <div class="input-group" id="qtycart">

                    <span class="input-group-btn">
                 
          


            <br>


            <a href="{{route('addtocartproduct',$product->id)}}" class="btn btn-dark">Add to Cart</a>
            
       
       
        </div>

    </div> 
</div> 

    @endsection