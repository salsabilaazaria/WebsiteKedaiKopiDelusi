@extends('admin.layouts.admin')

@section('content')

<br><br>

<div class="container">
    
    <h1>Add Product</h1>

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <p>Incorrect Data</p>
    </div>
    @endif

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif

    <form method="post" action="/add_product" enctype="multipart/form-data">
        <!-- @csrf -->

        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Product Name">
        </div>

        <div class="form-group">
            <label for="cateogry">Category</label>
            <select class="form-control" name="category" placeholder="Select Category">
                @foreach ($category as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- <div class="form-group">
            <label for="category">Category</label>
            <input type="number" class="form-control" name="category" placeholder="Product Category">
        </div> -->

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Product Description">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" placeholder="Product Price">
        </div>

        <!-- <div class="form-group">
            <label for="image">Image</label>
            <input type="text" class="form-control" name="image" placeholder="Product Image">
        </div> -->

        <div class="form-group">
            <label for="image">Choose File</label><br>
            <input id="image" type="file" name="image">
        </div>

        <button type="submit" class="btn btn-secondary">Add Product</button>
    </form>
<br>
</div>

<br><br>

@endsection