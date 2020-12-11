@extends('admin.layouts.admin')

@section('content')

<br><br>

<div class="container">

    <br>
    
    <div class="d-flex justify-content-center">
        <svg width="9em" height="9em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
        </svg>
    </div>
    
    <br>

    <h1 class="text-center">ADMIN</h1>

    <br>
    <br>

    <div class="d-flex justify-content-center">
        <a class="btn btn-dark btn-lg btn-block" href="{{ url('/add_product_show') }}">Add Product</a>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <a class="btn btn-dark btn-lg btn-block" href="{{ url('/add_category_show') }}">Add Category</a>
    </div>
    
    <br><br>

</div>

<br><br>

@endsection