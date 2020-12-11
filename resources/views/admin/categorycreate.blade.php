@extends('admin.layouts.admin')

@section('content')

<br><br>

<div class="container">
    
    <h1>Add Category</h1>

    <br>

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

    <form method="post" action="/add_category">
        <!-- @csrf -->

        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Category</label>
            <input type="text" class="form-control" name="name" placeholder="Cateogry Name">
        </div>

        <br>

        <button type="submit" class="btn btn-secondary">Add Category</button>
    </form>

</div>

<br><br>

@endsection