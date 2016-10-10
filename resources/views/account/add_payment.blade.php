@extends('layouts.app')

@section('content')
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

    <label for="newFullName">Expiration Month:</label>
    <input type="text" class="form-control" id="newFullName" name="expirationMonth">

    <label for="newFullName">Expiration Year:</label>
    <input type="text" class="form-control" id="newFullName" name="expirationYear">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
