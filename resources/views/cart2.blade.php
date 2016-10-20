@extends('layouts.app')


@section('scripts-head')
    <!-- Start of Scripts Added to Head Section -->

    <!-- End of Scripts Added to Head Section -->
@endsection

@section('scripts-body')
    <!-- Start of Scripts Added to Body Section -->

    <!-- End of Scripts Added to Body Section -->
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif

            <div class="panel panel-default">

                <div class="panel-heading">Cart</div>

                <div class="panel-body">
                    @foreach($cart as $item)
                        <li>
                        ID: {{ $item->product_id }} <br> <!-- Displayed For Debugging - Remove Later -->
                        Product: {{ $item->product->productName }} <br>
                        Inventory: {{ $item->product->quantity }} <br> <!-- Displayed For Debugging - Remove Later -->
                        Price: ${{ $item->product->price }} <br>
                        quantity: {{ $item->quantity }} <br>
                        <a href="{{ action('CartController@addToCart', ['id' => $item->product_id]) }}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a>
                        <a href="{{ action('CartController@removeFromCart', ['id' => $item->product_id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a>
                        </li>
                    @endforeach
                    <br><b>Subtotal ({{ $total_quantity }}): ${{ $total_price }}</b>
                </div>

            </div>
                                    <a href="{{ action('CartController@startProcessOrderForm') }}" class="btn btn-primary">Process Order</a><br><br><br>
        </div>
    </div>
</div>
@endsection
