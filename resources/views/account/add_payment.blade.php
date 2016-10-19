@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li><a href="http://localhost/emq/public/account">Account Management</a></li>
  <li><a href="http://localhost/emq/public/account/payment">Payment Methods</a></li>
  <li class="active">Add New Payment Method</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Payment Method</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


 <form method="POST" action="{{ action('PaymentController@addPaymentMethod') }}">
 	{!! csrf_field() !!}
  <div class="form-group">
    <label for="newFullName">Full Name on Card:</label>
    <input type="text" class="form-control" id="newFullName" name="fullNameOnCard">
    
    <label for="newFullName">Card Number:</label>
    <input type="text" class="form-control" id="newFullName" name="cardNumber">

    <div class="row">
        <div class="col-xs-2">
            <label for="newFullName">Expiration Month:</label>
            <select class="form-control" id="expirationMonth" name="expirationMonth">
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
        </div>
        <div class="col-xs-2">
            <label for="newFullName">Expiration Year:</label>
            <input type="text" class="form-control" id="expirationYear" name="expirationYear">
        </div>
</div>

<br>
<div class="">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
