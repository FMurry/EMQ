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


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif
                <h1> Under Construction </h1>
            <div class="panel panel-default">

                <div class="panel-heading">Select Shipping Address</div>

                <div class="panel-body">
                    JSON Encoded String Data<br>
                    {{ $addresses }}
                    <br><br><br>
                    @if( count($addresses) > 0 )

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
      
                            </li>
                        @endforeach

                    @else
                        Please add a shipping address to your account.<br>
                        <a href="{{ action('AddressController@getAddress') }}" class="btn btn-default">Manage Shipping Addresses</a><br>
                    @endif


                </div>

            </div>

            <div class="panel panel-default">

                <div class="panel-heading">Select Payment Option</div>

                <div class="panel-body">
                    JSON Encoded String Data<br>
                    {{ $paymentMethods }}
                    <br><br><br>
                    @if( count($paymentMethods) > 0 )

                        @foreach($paymentMethods as $item)
                            <li>
                            ID: {{ $item->id }} <br>
                            Name On Card: {{ $item->nameOnCard }} <br>
                            Last Four: {{ $item->lastFour }} <br>
                            Expiration Month: {{ $item->expMonth }} <br>
                            Expiration Year: {{ $item->expYear }} <br>

                            </li>
                        @endforeach
                    @else
                        Please add a payment option to your account.<br>
                        <a href="{{ action('PaymentController@getPaymentMethods') }}" class="btn btn-default">Manage Payment Methods</a><br>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
