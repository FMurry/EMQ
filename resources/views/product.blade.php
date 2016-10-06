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
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
<b>Inventory</b>
<br>
Product ID: {{ $product->id }} <br>
Product Name: {{ $product->productName }} <br>
Inventory Quantity: {{ $product->quantity }} <br>
<a href="{{ action('CartController@addToCart', ['id' => $product->id]) }}" class="btn btn-default">Add to Cart</a><br>


<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
