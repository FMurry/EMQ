@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li><a href="{{ url('/account') }}">Account Management</a></li>
  <li><a href="{{ url('/account/payment') }}">Payment Methods</a></li>
  <li class="active">Add New Payment Method</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
            @endif
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
@if (session('alert'))
        <div class="alert alert-danger">
            <ul>
            <li>{{ session('alert') }}</li>
            </ul>
        </div>
@endif

 <form method="POST" action="{{ action('PaymentController@addPaymentMethod') }}" autocomplete="on">
 	{!! csrf_field() !!}
  <div class="form-group">
    <label for="newFullName">Full Name on Card:</label>
    <input type="text" class="form-control" id="newFullName" name="fullNameOnCard" placeholder="Enter Full Name">
    
    <label for="newFullName">Card Number:</label>
    <input type="text" class="form-control" id="newFullName" name="cardNumber" placeholder="Enter Card Number">

    <div class="row">
        <div class="col-md-2">
            <label for="newFullName">Expiration Month:</label>
            <select class="form-control" id="expirationMonth" name="expirationMonth">
                <option></option>
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
        <div class="col-md-2">
            <label for="newFullName">Expiration Year:</label>
            <select class="form-control" id="expirationYear" name="expirationYear">
                <option></option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="newFullName">Card Security Code:</label>
            <input type="text" class="form-control" id="cardSecurity" name="cardSecurityCode" placeholder="Enter CSV number">
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
