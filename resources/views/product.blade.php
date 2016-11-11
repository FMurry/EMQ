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
            <div class="panel panel-warning">
                <div class="panel-heading"><h3>{{ stripslashes($product->productName) }}</h3></div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
                    <div class="row" style="padding: 20px;">

                        <div class="col-md-4" style="text-align: center;">
                            <div><img src="{{asset('product_images/' . $product->image)}}" style="width: 100%;"></div>

                            @if( $product->available)
                            <a href="{{ action('CartController@addToCart', ['id' => $product->id]) }}" class="btn btn-primary">Add to Cart</a><br> 
                            <p>{{ $product->quantity }} left in stock</p>  
                            @else
                            <br>
                            <button type="button" class="btn btn-danger">Item Not Unavailable</button>
                            @endif

                        </div>
                        
                        <div class="col-md-8">
                            <!-- Product ID: {{ $product->id }} <br> Displayed For Debugging - Remove Later -->
                            <h3>Price: ${{ $product->price }}</h3>
                            Brand: {{ stripslashes($product->brand) }} |
                            Category: {{ stripslashes($product->category) }} <br>
                            Description:<br> {!! stripslashes($product->description) !!} <br>
                            
                            
                        </div>
                    
                    </div>


<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
