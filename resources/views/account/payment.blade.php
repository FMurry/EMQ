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

            <div class="panel panel-default">

                <div class="panel-heading">Payment Methods</div>

                <div class="panel-body">
                    JSON Encoded String Data<br>
                    {{ $paymentMethods }}
                    <br><br><br>

                @foreach($paymentMethods as $item)
                    <li>
                    ID: {{ $item->id }} <br>
                    Name On Card: {{ $item->nameOnCard }} <br>
                    Last Four: {{ $item->lastFour }} <br>
                    Expiration Month: {{ $item->expMonth }} <br>
                    Expiration Year: {{ $item->expYear }} <br>
                    <a href="{{ action('PaymentController@deletePaymentMethod', ['id' => $item->id]) }}" class="btn btn-danger">delete</a>
                    </li>
                @endforeach

                <a href="./payment/add" class="btn btn-success">Add New Payment Method</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
