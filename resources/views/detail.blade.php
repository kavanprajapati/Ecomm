@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-image" src="{{$detail->gallery}}" alt="{{$detail->name}}">
        </div>
        <div class="col-sm-6">
            <a href="/">Go Back</a>
            <h2>Name  : {{$detail->name}}</h2>
            <h3>Price : {{$detail->price}}</h3>
            <h4>Category : {{$detail->category}}</h4>
            <h4>Description : {{$detail->description}}</h4>
            <br><br>
            <button class="btn btn-success">Add to Cart</button>
            <br><br>
            <button class="btn btn-primary">Buy Now</button>
        </div>
    </div>
</div>

@endsection