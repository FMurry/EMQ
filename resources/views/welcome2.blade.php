@extends('layouts.app')


@section('scripts-head')
    <!-- Start of Scripts Added to Head Section -->
    <link rel="stylesheet" type="text/css" href="misc/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="misc/slick/slick-theme.css"/>
    <!-- End of Scripts Added to Head Section -->
@endsection

@section('scripts-body')
    <!-- Start of Scripts Added to Body Section -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $(document).ready(function(){
          $('.deals-slick').slick({
            slidesToShow: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000
          });
          $('.popular-slick').slick({
            slidesToShow: 3,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 5000
          });
        });
    </script>

    <!-- End of Scripts Added to Body Section -->
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    
                    <h1 style="width: 100%; text-align: center;">Checkout these great deals!</h1>

                    <div class="slide-wrapper" style="text-align: center">
                        <div class="deals-slick" style="width: 90%; margin: 0px auto;">
                          <img src="http://localhost/emq/public/deal_images/emq-deal-01.jpg" alt="" style="">
                          <img src="http://localhost/emq/public/deal_images/emq-deal-02.jpg" alt="" style="">
                          <img src="http://localhost/emq/public/deal_images/emq-deal-03.jpg" alt="" style="">
                          <img src="http://localhost/emq/public/deal_images/emq-deal-04.jpg" alt="" style="">
                        </div>                        
                    </div>

                    <h3 style="width: 100%;">Popular Items</h3>

                    <div class="slide-wrapper" style="text-align: center">
                        <div class="popular-slick" style="width: 90%; margin: 0px auto;">
                          
                              @foreach($products as $product)
                                <div class="col-md-4" style="">
                                    <div class="panel panel-warning" style="margin: 10px;">
                                        <div class="panel-heading" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                        {{ stripslashes($product->productName) }}
                                        </div>
                                        <div class="panel-body" style="text-align: center">
                                            <div style="margin: 5px auto;"></div>
                                        <!-- Margins are off for some reason... -->
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
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
