@extends('master')

@section('content')

<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h2>Cart List</h2>
            <div class="">
                @foreach($cartdata as $product)
                <div class="row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/{{ $product->id }}">
                            <img class="trending-image" src="{{ $product->gallery }}">
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <div class="">
                            <h2>{{ $product->name }}</h2>
                            <h5>{{ $product->description }}</h5>
                        </div>
                    </div>
                    <div class="col-sm-3">
                       <button class="btn btn-warning">Remove From Cart</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection