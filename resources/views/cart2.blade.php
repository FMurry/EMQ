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
                    JSON Encoded String Data<br>
                    {{ $cart }}
                    <br><br><br>
                    @foreach($cart as $item)
                        <li>
                        ID: {{ $item->product_id }} <br>
                        Product: {{ $item->product->productName }} <br>
                        Inventory: {{ $item->product->quantity }} <br>
                        quantity: {{ $item->quantity }} <br>
                        <a href="{{ action('CartController@addToCart', ['id' => $item->product_id]) }}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a>
                        <a href="{{ action('CartController@removeFromCart', ['id' => $item->product_id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a>
                        </li>
                    @endforeach
                </div>

            </div>
                                    <a href="{{ action('CartController@startProcessOrderForm') }}" class="btn btn-default">Process Order</a><br><br><br>
        </div>
    </div>
</div>
@endsection
