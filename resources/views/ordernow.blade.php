@extends('master')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="custom-product">
    <div class="col-sm-6">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>Price</td>
                    <td>{{$total_price}} INR</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>0 INR</td>
                </tr>
                <tr>
                    <td>Delivery Charges</td>
                    <td>100 INR</td>
                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>{{$total_price+100}} INR</td>
                </tr>
            </tbody>
        </table>

        <form action="/action_page.php">
            <div class="form-group">
                <label for="">Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <label>Payment Method</label>
                <p><input type="radio" name="payment"><span>Online Payment</span></p>
                <p><input type="radio" name="payment"><span>EMI Payment</span></p>
                <p><input type="radio" name="payment"><span>Payment On Delivery</span><p>
            </div>
            <button type="submit" class="btn btn-default">Order Now</button>
        </form>
    </div>
</div>

@endsection