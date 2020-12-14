@extends('master')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h2>Orders List</h2>
            <div class="">
                @foreach($orders as $order)
                <div class="row searched-item cart-list-devider">
                    <div class="col-sm-3">
                        <a href="detail/{{ $order->id }}">
                            <img class="trending-image" src="{{ $order->gallery }}">
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <div class="">
                            <h2>{{ $order->name }}</h2>
                            <h5>Delivery Status : {{ $order->status }}</h5>
                            <h5>Payment Status : {{ $order->payment_status }}</h5>
                            <h5>Payment Method : {{ $order->payment_method }}</h5>
                            <h5>Delivery Address : {{ $order->address }}</h5>
                        </div>
                    </div>
                    <div class="col-sm-3">

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection