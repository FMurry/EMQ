@extends('layouts.app')



@section('scripts-head')
    <!-- Start of Scripts Added to Head Section -->
<style>
.modal.modal-wide .modal-dialog {
  width: 80%;
}
.modal-wide .modal-body {
  overflow-y: auto;
}
</style>
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
                <div class="panel-heading"><h3>{{ stripslashes($data['product']->productName) }}</h3></div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
                    <div class="row" style="padding: 20px;">

                        <div class="col-md-4" style="text-align: center;">
                            <div data-toggle="modal" data-target="#myModal"><img src="{{asset('product_images/' . $data['product']->image)}}" style="width: 100%;"></div>

                            @if( $data['product']->available)
                            <a href="{{ action('CartController@addToCart', ['id' => $data['product']->id]) }}" class="btn btn-primary">Add to Cart</a><br> 
                            <p>{{ $data['product']->quantity }} left in stock</p>  
                            @else
                            <br>
                            <button type="button" class="btn btn-danger">Item Not Available</button>
                            @endif

                            @if($data['rating']==0)
                            <input type="number" name="your_awesome_parameter" id="some_id" class="rating" data-clearable="remove" value="0"/>

                            <a href="#"><p>No reviews</p></a>
                            <input class="rating" data-max="5" data-min="1" id="some_id" name="your_awesome_parameter" type="number" value="0" />
                            @else
                            <input class="rating" data-max="5" data-min="1" id="some_id" name="your_awesome_parameter" type="number" value="{{ round($data['rating']) }}" />
                            <a href="#"><p>
                            {{ $data['count'] }} Reviews</p></a>
                            @endif
                        </div>
                        
                        <div class="col-md-8">
                            <!-- Product ID: {{ $data['product']->id }} <br> Displayed For Debugging - Remove Later -->
                            <h3>Price: ${{ $data['product']->price }}</h3>
                            Brand: {{ stripslashes($data['product']->brand) }} |
                            Category: {{ stripslashes($data['product']->category) }} <br>
                            Description:<br> {!! stripslashes($data['product']->description) !!} <br>
                            
                            
                        </div>
                    
                    </div>
<!-- Modal -->
<div id="myModal" class="modal modal-wide fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ stripslashes($data['product']->productName) }}</h4>
      </div>
      <div class="modal-body">
        <img src="{{asset('product_images/' . $data['product']->image)}}" style="width: 100%;">
      </div>
      <div class="modal-footer">
            @if( $data['product']->available)
    <a href="{{ action('CartController@addToCart', ['id' => $data['product']->id]) }}" class="btn btn-primary">Add to Cart</a>
    @endif
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End of Modal -->

<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
