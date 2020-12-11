@extends('admin.layouts.admin')

@section('content')

<br><br>

<div class="container">
    
    <h1>Product</h1>

    <br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="align-middle">Product ID</th>
                <th scope="col" class="align-middle">Product Image</th>
                <th scope="col" class="align-middle">Product Name</th>
                <th scope="col" class="align-middle">Product Category</th>
                <th scope="col" class="align-middle">Product Price</th>
                <th scope="col" class="align-middle">Product Description</th>
                <th scope="col" class="align-middle">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($category as $c)
                @foreach ($products as $p)
                    @if($p->category_id == $c->id)
                        <tr>
                            <td class="align-middle">{{ $p->id }}</td>    
                            <td class="align-middle"><img src="/images/{{ $p->image }}" width="120px" height="120px"></td>
                            <td class="align-middle">{{ $p->name }}</td>
                            <td class="align-middle">{{ $c->name }}</td>
                            <td class="align-middle">{{ $p->price }}</td>
                            <td class="align-middle">{{ $p->description }}</td>
                            <td class="align-middle"><a href="{{ url('/delete_product/'.$p->id) }}" class="btn btn-danger">Delete</a></td>
                            <!-- <td class="align-middle"><button type="button" class="btn btn-danger">Delete</button></td> -->
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
    

</div>

<br><br>

@endsection