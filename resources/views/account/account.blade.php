@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Account Management</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
<a href="{{ url('/edit') }}" class="btn btn-default">Manage Account Details</a><br>
<a href="{{ action('CartController@getCart') }}" class="btn btn-default">Manage Shopping Cart</a><br>
<a href="{{ action('AddressController@getAddress') }}" class="btn btn-default">Manage Shipping Addresses</a><br>
<a href="{{ action('PaymentController@getPaymentMethods') }}" class="btn btn-default">Manage Payment Methods</a><br>


<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
