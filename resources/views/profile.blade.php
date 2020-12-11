@extends('layouts.app')

@section('content')

<!-- pagecontroller@getprofile -->
<div class="container">
<br>
<div class="row">

    <div class="col-2 m-1">
      <svg width="9em" height="9em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
      </svg>
    </div>
    <div class="col-9">
      <!-- <div class="d-flex text-center align-middle justify-content-center"> -->
      <br><br>
        <h1 class="align-middle ">{{$user->name}}</h1>
      <!-- </div> -->
      
    </div>


</div>


<div class="row">
    <h3 class="m-4"> Subscription</h3>
</div>

  @foreach ($subscription as $s)
      <div class="row">
      
        <div class="accordion" style="width:100%" id="accordionExample">

          <div class="card">
            <div class="card-header" id="heading{{$s->id}}">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed text-dark text-left" type="button" data-toggle="collapse" data-target="#collapse{{$s->id}}" aria-expanded="false" aria-controls="collapse{{$s->id}}">
                # &nbsp {{$s->duration}} Months &nbsp <br> Subscription Start : {{$s->created_at->toDateString()}} <br> Delivery Time : {{$s->deliverytime}} <br> {{$s->deliverytype}}
                </button>
              </h2>
            </div>

            <div id="collapse{{$s->id}}" class="collapse" aria-labelledby="heading{{ $s->id }}"  data-parent="#accordionExample">
              <div class="card-body">
              <table class="table">
                <tbody>
                    @foreach($s->order->items as $product)
                    <tr>
                        <td><img id="photoproductcart" src="/images/{{$product['item']['image']}}" alt=""></td>
                        <td>  <div>
                                <strong>{{$product['item']['name']}}</strong>
                                <p>{{$product['item']['description']}}</p>
                            </div>
                        </td>
                        <td class="align-middle" >{{$product['qty']}}</td>   
                        <td class="align-middle" >Rp.{{$product['item']['price']}}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
                </table>

                
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

  <!-- <p>data subscription</p> -->




<!-- transaction history -->
<div class="row">
    <h3 class="m-4"> Transaction History</h3>
</div>
      @foreach ($orders as $order)
      <div class="row">
      
        <div class="accordion" style="width:100%" id="accordionExample">

          <div class="card">
            <div class="card-header" id="headingorder{{$order->id}}">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapseorder{{$order->id}}" aria-expanded="false" aria-controls="collapseorder{{$order->id}}">
                # &nbsp{{$order->created_at->toDateString()}}
                </button>
              </h2>
            </div>

            <div id="collapseorder{{$order->id}}" class="collapse" aria-labelledby="headingorder{{ $order->id }}" data-parent="#accordionExample">
              <div class="card-body">
              <table class="table">
                <tbody>
                    @foreach($order->cart->items as $product)
                    <tr>
                        <td><img id="photoproductcart" src="/images/{{$product['item']['image']}}" alt=""></td>
                        <td>  <div>
                                <strong>{{$product['item']['name']}}</strong>
                                <p>{{$product['item']['description']}}</p>
                            </div>
                        </td>
                        <td class="align-middle" >{{$product['qty']}}</td>   
                        <td class="align-middle" >Rp.{{$product['item']['price']}}</td>
                    </tr>
                    @endforeach
                  
                </tbody>
                </table>
                <div class="d-flex justify-content-end"><strong>Total : Rp.{{$order->cart->totalPrice}}</strong></div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      


    



  
    <br><br>
 








</div>

@endsection

