@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Address Management</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
 <form method="POST" action="{{ action('AddressController@addAddress') }}">
 	{!! csrf_field() !!}
  <div class="form-group">
    <label for="newFullName">Full Name:</label>
    <input type="text" class="form-control" id="newFullName" name="newFullName">
    <label for="newAddress">Address</label>
    <input type="text" class="form-control" id="newAddress" name="newAddress">
    <label for="newAddress2">Address Line 2</label>
    <input type="text" class="form-control" id="newAddress2" name="newAddress2">
    <label for="newCity">City</label>
    <input type="text" class="form-control" id="newCity" name="newCity">
    <label for="newState">State</label>
    <input type="text" class="form-control" id="newState" name="newState">
    <label for="newZip">Zip</label>
    <input type="text" class="form-control" id="newZip" name="newZip">
    <label for="newCountry">Country</label>
    <input type="text" class="form-control" id="newCountry" name="newCountry">
    <label for="newPhone">Phone</label>
    <input type="text" class="form-control" id="newPhone" name="newPhone">
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
