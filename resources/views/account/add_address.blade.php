@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li><a href="http://localhost/emq/public/account">Account Management</a></li>
  <li><a href="http://localhost/emq/public/account/address">Address Book</a></li>
  <li class="active">Add New Address</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Address Management</div>

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

 <form method="POST" action="{{ action('AddressController@addAddress') }}">
 	{!! csrf_field() !!}
  <div class="form-group">
    <label for="newFullName">Full Name:</label>
    <input type="text" class="form-control" id="newFullName" name="newFullName" placeholder="Enter Full Name">

    <label for="newAddress">Address</label>
    <input type="text" class="form-control" id="newAddress" name="newAddress" placeholder="Enter Number and Street">

    <label for="newAddress2">Address Line 2</label>
    <input type="text" class="form-control" id="newAddress2" name="newAddress2" placeholder="Apt., Unit #, etc.">

    <div class="row">
        <div class="col-xs-3">
            <label for="newCity">City</label>
            <input type="text" class="form-control" id="newCity" name="newCity" placeholder="Enter City">
        </div>
        <div class="col-xs-3">
            <label for="newState">State</label>
            <input type="text" class="form-control" id="newState" name="newState" value ="California" readonly="readonly">
        </div>
        <div class="col-xs-3">
            <label for="newZip">Zip</label>
            <input type="text" class="form-control" id="newZip" name="newZip" placeholder="Enter Zipcode">
        </div>
    </div>
    
    <label for="newCountry">Country</label>
    <input type="text" class="form-control" id="newCountry" name="newCountry" value ="United States" readonly="readonly">

    <label for="newPhone">Phone</label>
    <input type="text" class="form-control" id="newPhone" name="newPhone" placeholder="Enter Phone Number">
    <span id="helpBlock" class="help-block"><em>Ex: 123-456-7890</em></span>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- Stuff I added -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
