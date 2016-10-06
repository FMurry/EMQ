@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Payment Method</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
 <form method="POST" action="{{ action('PaymentController@addPaymentMethod') }}">
 	{!! csrf_field() !!}
  <div class="form-group">
    <label for="newFullName">Full Name on Card:</label>
    <input type="text" class="form-control" id="newFullName" name="nameOnCard">
    
    <label for="newFullName">Card Number:</label>
    <input type="text" class="form-control" id="newFullName" name="cardNumber">

    <label for="newFullName">Expiration Month:</label>
    <input type="text" class="form-control" id="newFullName" name="expMonth">

    <label for="newFullName">Expiration Year:</label>
    <input type="text" class="form-control" id="newFullName" name="expYear">
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
