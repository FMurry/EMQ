@extends('layouts.app')


@section('scripts-head')
    <!-- Start of Scripts Added to Head Section -->

    <!-- End of Scripts Added to Head Section -->
@endsection

@section('scripts-body')
    <!-- Start of Scripts Added to Body Section -->

    <!-- End of Scripts Added to Body Section -->
@endsection


@section('content')
<ol class="breadcrumb">
  <li><a href="http://localhost/emq/public/account">Account Management</a></li>
  <li class="active">Address Book</li>
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

                <div class="panel-heading">Address Book</div>

                <div class="panel-body">
                    JSON Encoded String Data<br>
                    {{ $addresses }}
                    <br><br><br>
                    @foreach($addresses as $address)
                        <li>
                        ID: {{ $address->id }} <br>
                        Name: {{ $address->fullName }} <br>
                        Address: {{ $address->address }} <br>
                        Address Line 2: {{ $address->address2 }} <br>
                        City: {{ $address->city }} <br>
                        State: {{ $address->state }} <br>
                        Zip: {{ $address->zip }} <br>
                        Country: {{ $address->country }} <br>
                        Phone: {{ $address->phone }} <br>
                        <a href="{{ action('AddressController@removeAddress', ['id' => $address->id]) }}" class="btn btn-danger">delete</a>
                        </li>
                    @endforeach
                    <a href="{{ action('AddressController@addAddressView') }}" class="btn btn-success">Add New Address</a>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
