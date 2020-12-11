@extends('layouts.app')

@section('content')

<br><br>

<div class="row m-4">
  <div class="col-7">
    <div class="container mx-3">

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <p>Please fill all the blank</p>
    </div>
    @endif

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif

    <form method="post" action="/postcheckout" enctype="multipart/form-data">
        <!-- @csrf -->

        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="fa fa-user-circle"> Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>

        <div class="form-group">
            <label class="fa fa-map-pin"for="address"> Address</label>
            <input type="text" class="form-control" name="address" placeholder="Address">
        </div>

        <div class="form-group">
          <label for="deliverytype"><i class="fa fa-motorcycle"></i> Delivery Type</label><br>
          <select class="form-control" name="deliverytype" placeholder="Delivery Type">
            <option value="Delivery">Delivery</option>
            <option value="Pickup">Pick Up</option>
          </select>
        </div>

        <div class="form-group" >
          <label for="ordertype"><i class="fa fa-pencil-square-o"></i> Order Type</label><br>
          <select class="form-control" name="ordertype" id="ordertype" placeholder="Order Type">
            <option value="onetime">One Time</option>
            <option value="subscription">Subscribe</option>
          </select>
        </div>
        <!-- HIDDEN FORM -->
        <div class="form-group" id="deliverytime" style="display:none;">
            <label for="deliverytime">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
              <path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
            Delivery Time</label>
            <input type="text" class="form-control" name="deliverytime" placeholder="With Format HH:MM">
        </div>

        <div class="form-group" id="duration" style="display:none;">
          <label for="duration"><i class="fa fa-hourglass-start"></i> Subscription Duration</label><br>
          <select class="form-control" name="duration" id="durationtime"  placeholder="Order Type" >
            <option value="0">--</option>
            <option value="1">1 Months</option>
            <option value="2">2 Months</option>
            <option value="3">3 Months</option>
          </select>
        </div>
        <!-- END OF HIDDEN FORM -->

        <script type="text/javascript"
          src="jquery-ui-1.10.0/tests/jquery-1.9.0.js"></script>
          <script src="jquery-ui-1.10.0/ui/jquery-ui.js"></script>
          <script>
          $('#ordertype').on('change',function(){
            if( $(this).val()==="subscription"){
            $("#deliverytime").show()
            $("#duration").show()

            }
            else{
            $("#deliverytime").hide()
            $("#duration").hide()
            $("#subsprice").hide()
            $("#totalorder").show()
            }
          });
        </script>
    
        <div class="form-group">
            <label for="payment"><i class="fa fa-bank"></i> Payment</label><br>
            <input type="radio" id="bank" name="payment" value="banktransfer">
            <label for="bank">Bank Transfer</label><br>
            <input type="radio" id="gopay" name="payment" value="gopay">
            <img src="logogopay.png" style="max-width:100px" alt="">
        </div>

          <br><br>
        <button type="submit" class="btn btn-dark p-4">COMPLETE PURCHASE</button>
    </form>
  </div>
  </div>



  <div class="col-5">



    <!-- colom tengah -->
    <div class="container">
      <h4>
        <i class="fa fa-shopping-cart"></i> 
        Cart 
        <span class="price" style="color:black">
          <b>({{Session::has('cart')? Session::get('cart')->totalQty : ''}})</b>
        </span>
      </h4> <br>
      @foreach($products as $product)
        <div class="d-flex flex-row bd-highlight mb-3">
          <div class="p-2 flex-grow-1 bd-highlight"> <p>{{$product['item']['name']}}</p></div>
          <div class="p-2 bd-highlight"><p>{{$product['qty']}} &nbsp {{$product['item']['price']}}</p></div>
        </div>
        
        <hr>
      @endforeach
        <p style="display:none;" id="totalitem">{{$total}}</p>
        <div class="d-flex justify-content-end">  
          <p id="totalorder">Total Order <span class="price" style="color:black" ><b >{{$total}}</b></span></p>
        </div> 
        <div class="d-flex justify-content-end"   >  
          <p style="display:none;" id="subsprice">Total Subscription
            <span class="price" style="color:black"><b id="subsfee"></b></span> 
          </p>
        </div>  
  
     
    </div>

    <script type="text/javascript"
      src="jquery-ui-1.10.0/tests/jquery-1.9.0.js"></script>
    <script src="jquery-ui-1.10.0/ui/jquery-ui.js"></script>
    <script>
      $('#durationtime').on('change',function(){
        var total = parseInt(document.getElementById("totalitem").innerHTML);
        $("#totalorder").hide()
        if( $(this).val()=="1"){
          document.getElementById("subsfee").innerHTML = total*30*0.9;
          $("#subsprice").show()
        
          
        }
        if( $(this).val()=="2"){
          document.getElementById("subsfee").innerHTML = total*60*0.9;
          $("#subsprice").show()
          
        }
        if( $(this).val()=="3"){
          document.getElementById("subsfee").innerHTML = total*90*0.9;
          $("#subsprice").show()
          
        }
        
          });
    </script>


  </div>

</div>


<br>
</div>

<br><br>

@endsection