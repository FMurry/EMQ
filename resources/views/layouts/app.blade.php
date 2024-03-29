    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EMQ</title>
    @yield('scripts-head')

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/physics_2.png') }}" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    EMQ
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guest())
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/storelocator') }}">Store Locator</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>
                    @else
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    <li><a href="{{ url('/storelocator') }}">Store Locator</a></li>
                    <li><a href="{{ url('/about') }}">About</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    <!-- User is an admin-->
                    @elseif (Auth::user())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/shop') }}"><i class="fa fa-btn fa-th"></i>Shop EMQ</a></li>
                                <li><a href="{{ url('/account') }}"><i class="fa fa-btn fa-edit"></i>Account Management</a></li>
                                <li><a href="{{ url('/account/orders') }}"><i class="fa fa-btn fa-reorder"></i>Order History</a></li>
                                @if(Auth::user()->access() >= 1)
                                <li><a href="{{ url('/admin/management') }}"><i class="fa fa-btn fa-gears"></i>Admin</a></li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                            <li><a href="{{ url('/cart') }}"><sub>{{ Auth::user()->cart() }}</sub><i class="fa fa-btn
                                 fa-shopping-cart"></i>Cart</a></li>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('scripts-body')
<style>
    div.fixedLeft{
        position: fixed;
        bottom: 20px;
        left: 35px;
    }
</style>
<div class="fixedLeft">
    <center><img src="{{asset('images/physics.svg')}}" style="width: 80px;">
    <br><label><font size="6" color="orange">E</font><font size="6" color="red">M</font><font size="6" color="orange">Q</font></label></center>
</div>
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Slick Slide -->
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="misc/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{ asset('lib/bootstrap/bootstrap-rating-input.min.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
