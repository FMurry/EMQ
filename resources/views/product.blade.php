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
<img src="{{asset('product_images/' . $product->image)}}" width=60%><br>
Product ID: {{ $product->id }} <br> <!-- Displayed For Debugging - Remove Later -->
Inventory Quantity: {{ $product->quantity }} <br> <!-- Displayed For Debugging - Remove Later -->
Product Name: {{ stripslashes($product->productName) }} <br>
Brand: {{ stripslashes($product->brand) }} <br>
Category: {{ stripslashes($product->category) }} <br>
Price: ${{ $product->price }} <br>
Description:<br> {!! stripslashes($product->description) !!} <br>
<a href="{{ action('CartController@addToCart', ['id' => $product->id]) }}" class="btn btn-primary">Add to Cart</a><br>


<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
