@extends('admin.layouts.admin')

@section('content')

<br><br>

<div class="container">
    
    <h1>Category</h1>

    <br>

    <!-- <table class="table">
        <tbody>
            @foreach ($category as $c)
            <tr>
                <th class="align-middle">{{ $c->name }}</th>
            </tr>
            @endforeach
        </tbody>
    </table> -->



    <!-- <div class="accordion" id="accordionExample">
        @foreach ($category as $c)
            @if($c->id == 1)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                {{ $c->name }}
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            products
                        </div>
                    </div>
                </div>

            @else
                <div class="card">
                    <div class="card-header" id="heading{{ $c->id }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{ $c->id }}" aria-expanded="false" aria-controls="collapse{{ $c->id }}">
                                {{ $c->name }}
                            </button>
                        </h2>
                    </div>

                    <div id="collapse{{ $c->id }}" class="collapse" aria-labelledby="heading{{ $c->id }}" data-parent="#accordionExample">
                        <div class="card-body">
                            products
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div> -->


    <div class="accordion" id="accordionExample">
        @foreach ($category as $c)
            <div class="card">
                <div class="card-header" id="heading{{ $c->id }}">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed text-dark" type="button" data-toggle="collapse" data-target="#collapse{{ $c->id }}" aria-expanded="false" aria-controls="collapse{{ $c->id }}">
                            {{ $c->name }}
                        </button>
                    </h2>
                </div>

                <div id="collapse{{ $c->id }}" class="collapse" aria-labelledby="heading{{ $c->id }}" data-parent="#accordionExample">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle">Product ID</th>
                                    <th scope="col" class="align-middle">Product Image</th>
                                    <th scope="col" class="align-middle">Product Name</th>
                                    <th scope="col" class="align-middle">Product Price</th>
                                    <th scope="col" class="align-middle">Product Description</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $p)
                                    @if($p->category_id == $c->id)
                                        <tr>
                                            <td class="align-middle">{{ $p->id }}</td>    
                                            <td class="align-middle"><img src="/images/{{ $p->image }}" width="180px" height="180px"></td>
                                            <td class="align-middle">{{ $p->name }}</td>
                                            <td class="align-middle">{{ $p->price }}</td>
                                            <td class="align-middle">{{ $p->description }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- <h1>Product</h1>

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
                            <td class="align-middle"><button type="button" class="btn btn-danger">Delete</button></td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table> -->
    

</div>

<br><br>

@endsection