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
          $('.promo-items-slick').slick({
            slidesToShow: 3,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000
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
                    Welcome to EMQ - Your Electronic Retail Store!

                    <div class="slide-wrapper" style="text-align: center">
                        <div class="promo-items-slick" style="width: 90%; margin: 0px auto;">
                          <img src="http://image.flaticon.com/icons/svg/214/214337.svg" alt="Rocket" style="width:200px; height:200px;">
                          <img src="http://image.flaticon.com/icons/svg/214/214299.svg" alt="Globe" style="width:200px; height:200px;">
                          <img src="http://image.flaticon.com/icons/svg/214/214298.svg" alt="Donut" style="width:200px; height:200px;">
                          <img src="http://image.flaticon.com/icons/svg/214/214320.svg" alt="Map" style="width:200px; height:200px;">
                        </div>                        
                    </div>

                    <div class="row" style="width: 100%; text-align: center;">
                        <div class="col-md-4">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading">This is a box</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/214/214273.svg" alt="Box" style="width:200px; height:200px; margin: 5px;">
                                    <button class="btn btn-default">Add to Cart</button>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading">This is another box</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/214/214273.svg" alt="Box" style="width:200px; height:200px; margin: 5px;">
                                    <button class="btn btn-default">Add to Cart</button>                                
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading">We sell boxes</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/214/214273.svg" alt="Box" style="width:200px; height:200px; margin: 5px;">
                                    <button class="btn btn-default">Add to Cart</button>                                
                                </div>
                            </div>                            
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
