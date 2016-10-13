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
                          <div><h3>1</h3></div>
                          <div><h3>2</h3></div>
                          <div><h3>3</h3></div>
                          <div><h3>4</h3></div>
                          <div><h3>5</h3></div>
                          <div><h3>6</h3></div>
                        </div>                        
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
