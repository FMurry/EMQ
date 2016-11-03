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
                <div class="panel-heading">Shop</div>

                <div class="panel-body">

<!-- Stuff I added -->
                  
                    <div class="row" style="width: 100%; text-align: center;">
                      @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                {{ stripslashes($product->productName) }}
                                </div>
                                <div class="panel-body">
                                  <div style="margin: 5px auto;">
                                    <img src="http://localhost/emq/public/product_images/{{ $product->image }}" alt="..." style="max-height: 100px;">                               
                                  </div>
                                  <div>
                                    <a href="./product/{{ $product->id }}" class="btn btn-default">View Item</a>
                                  </div>
                                </div>
                            </div>                            
                        </div>
                      @endforeach                      
                    </div>

                  <!--</div>-->



<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
