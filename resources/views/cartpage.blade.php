@extends('layouts.app')

@section('content')

<div class = "container">

  @if(Session::has('cart'))
  <h2 class="m-3">Cart</h2>
  <table class="table">
    <tbody>
    @foreach($products as $product)
      <tr>

        <th scope="row"></th>
        <td><img id="photoproductcart" src="/images/{{$product['item']['image']}}" alt=""></td>
        <td>  <div>
                  <p>{{$product['item']['name']}}</p>
                  <p>{{$product['item']['description']}}</p>
              </div>
        </td>
        <td class="align-middle" >{{$product['item']['price']}}</td>

        <td class="align-middle">

        <form method="GET" action="/updateitem/{{$product['item']['id']}}">
          <input type="number" name="qty" id="qty" value="{{request()->input('qty') }}"class="form-control" placeholder="{{$product['qty']}}" aria-describedby="basic-addon1">
        </form>
        
        </td>
        <td class="align-middle">  
              <!-- remove data -->
              <a href="/removeitem/{{$product['item']['id']}}"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="black" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
              </svg></a>
        </td>
      
      </tr>
      @endforeach
      
    </tbody>
    
  </table>
  <p>*note : please press 'enter' when you update quantity of item</p>

  <!-- totalprice dan tombol checkout -->
  <div class="d-flex flex-row-reverse bd-highlight m-3">
    <div class="p-2 bd-highlight font-weight-bold">Rp.{{$totalPrice}}</div>
  

    <div class="p-2 bd-highlight font-weight-bold">Total : </div>
  </div>

  <div class="d-flex flex-row-reverse bd-highlight">
      <!-- ke checkout.blade.php -->
      <div class="p-2 bd-highlight"><a href="/checkout"class = "bg-dark text-light px-4 py-2 m-3 align-self-end"> Check Out </a></div>
  </div>

  <br><br><br>

</div>

@else
  <div class="container m-4" id="nocart">
    <svg id="nocartpic"width="10em" height="10em" viewBox="0 0 16 16" class="bi bi-cart-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
    <path fill-rule="evenodd" d="M6.646 5.646a.5.5 0 0 1 .708 0L8.5 6.793l1.146-1.147a.5.5 0 0 1 .708.708L9.207 7.5l1.147 1.146a.5.5 0 0 1-.708.708L8.5 8.207 7.354 9.354a.5.5 0 1 1-.708-.708L7.793 7.5 6.646 6.354a.5.5 0 0 1 0-.708z"/>
    </svg>
    <br>
    <h1 class="text-center" id="nocarttext">Your cart is empty</h1>
    <h3 class="text-center text-muted" id="nocarttext">but it doesn't have to be</h3>
    <br><br>
    <a class="bg-dark text-light p-3 px-4"href="/">SHOP NOW</a>
  </div>


@endif
@endsection