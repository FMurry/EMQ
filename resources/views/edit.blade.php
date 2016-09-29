@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
 <form method="POST" action="{{ action('ProductsController@changeName') }}">
 	{!! csrf_field() !!}
  <div class="form-group">
    <label for="newFullName">New Full Name:</label>
    <input type="text" class="form-control" id="newFullName" name="newFullName">
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
