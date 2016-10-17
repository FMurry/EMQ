@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="active">Account Management</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Account Management</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
                    <div class="row" style="width: 100%; text-align: center;">
                        <div class="col-md-3">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div href="{{ url('/edit') }}" class="panel-heading">Account Details</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/138/138669.svg" alt="Profile" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ url('/edit') }}" class="btn btn-default">Manage Account Details</a><br>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading">Shopping Cart</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/204/204283.svg" alt="Cart" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ action('CartController@getCart') }}" class="btn btn-default">Manage Shopping Cart</a><br>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading">Address Book</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/232/232508.svg" alt="AddressBook" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ action('AddressController@getAddress') }}" class="btn btn-default">Manage Addresses</a><br>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading">Payment Methods</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/235/235805.svg" alt="Payment" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ action('PaymentController@getPaymentMethods') }}" class="btn btn-default">Manage Payment Methods</a><br>                              
                                </div>
                            </div>                            
                        </div>
                    </div>

<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
