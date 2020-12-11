@extends('layouts.app')

@section('content')
<div class="container">
<h3 class ="m-4">{{$product->count()}} result found for '{{request()->input('query')}}'</h3>


<div class="col m-4">
        <div class="card-group">
        @foreach ($product as $item)
            <div class="card"><a href="/ProductDetails/{{$item->id}}">
            
                <img src="/images/{{$item->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title text-dark">{{$item->name}}</h5>
                <p class="card-text text-dark">{{$item->description}}</p>
                <p class="card-text text-dark">{{$item->price}}</p>
        
            </div></a>
           
        </div>
        @endforeach


</div><br><br>
<div class="align-self-end">{{ $product->withQueryString()->links() }}</div>


    
    @endsection