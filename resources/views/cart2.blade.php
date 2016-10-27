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

                <div class="panel-heading">Shopping Cart</div>

                <div class="panel-body">
                    @foreach($cart as $item)
                        <div class="row" style="padding: 20px;">
                            <div class="col-md-2" style="text-align: center;">                            
                                <div><img src="{{asset('product_images/' . $item->product->image)}}" style="width: 100%;"></div>
                            </div>
                            <div class="col-md-6" style="">
                                <!-- <a href="./product/@{{ $item->product->id }}">View Item</a> -->
                                <h4 style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $item->product->productName }}</h4>
                            </div>
                            <div class="col-md-2" style="">
                                @if($item->quantity <= 1)
                                <h4>${{$item->product->price}}</h4>
                                @else
                                <h4>${{($item->product->price * $item->quantity)}} ({{ $item->quantity }})</h4>
                                @endif
                            </div>
                            <div class="col-md-2" style="text-align: center;">
                                <h6>Quantity: {{ $item->quantity }}</h6>
                                <a href="{{ action('CartController@addToCart', ['id' => $item->product_id]) }}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
                                </a>
                                <a href="{{ action('CartController@removeFromCart', ['id' => $item->product_id]) }}" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                                </a>
                            </div>

                            <!-- <li>
                            ID: {{ $item->product_id }} <br>
                            Product: {{ $item->product->productName }} <br>
                            Inventory: {{ $item->product->quantity }} <br>
                            Price: ${{ $item->product->price }} <br>
                            quantity: {{ $item->quantity }} <br>
                            <a href="{{ action('CartController@addToCart', ['id' => $item->product_id]) }}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></a>
                            <a href="{{ action('CartController@removeFromCart', ['id' => $item->product_id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></a>
                            </li>  -->                           
                        </div>
                    @endforeach
                    <br><b>Subtotal ({{ $total_quantity }}): ${{ $total_price }}</b>
                </div>

            </div>
            <a href="{{ action('CartController@startProcessOrderForm') }}" class="btn btn-primary">Process Order</a>
            <br><br><br>
        </div>
    </div>
</div>
@endsection
