@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li><a href="http://localhost/emq/public/account">Account Management</a></li>
  <li class="active">Order History</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Order History</div>

                <div class="panel-body">
                    
<div class="container-fluid">
<!-- Stuff I added -->
@foreach($orders as $order)

            <div class="panel-default">
                <div class="panel-body">
            <div class="row"> <!-- address and payment row -->
                
                                
                <h3>Transaction ID: {{ $order->id }}</h3><br>
                <div class="col-md-4">
                <h3>Shipping From:</h3><br>
                <address>
                <strong>Store: {{ $order->store->name }} </strong><br>
                {{ $order->store->address }}, {{ $order->store->address2 }} <br>
                {{ $order->store->city }}, {{ $order->store->state }} {{ $order->store->zip }} <br>
                {{ $order->store->country }} <br>
                Phone: {{ $order->store->phone }} <br>
                </address>
                </div>

                <div class="col-md-4">
                <h3>Shipping To:</h3><br>
                <address>
                <strong>Name: {{ $order->address->fullName }} </strong><br>
                {{ $order->address->address }}, {{ $order->address->address2 }} <br>
                {{ $order->address->city }}, {{ $order->address->state }} {{ $order->address->zip }} <br>
                {{ $order->address->country }} <br>
                Phone: {{ $order->address->phone }} <br>
                </address>
                </div>

                <div class="col-md-4">
                <h3>Payment Method:</h3><br>
                <strong>Cardholder Name: {{ $order->payment->nameOnCard }}</strong><br>
                Creditcard Number: ****{{ $order->payment->lastFour }} <br>
                Exp: {{ $order->payment->expMonth }}/{{ $order->payment->expYear }} <br>
                </div>
              </div><!--end of address and payment row-->

              <div class="row"><!-- products row -->
                <h3>Products Ordered:</h3><br>
                <!-- start of display ordered products -->
                @foreach($order->products as $item)
                    <li>
                    Product: {{ $item->product->productName }} <br>
                    Price: ${{ $item->price }} <br>
                    quantity: {{ $item->quantity }} <br>
                    </li>
                @endforeach
                <!-- end of display ordered products -->

                <!-- start of display cost totals -->
                <br>
                <b>Subtotal:</b> ${{ $order->cost }}<br>
                <b>Tax:</b> ${{ $order->tax }}<br>
                <b>Shipping:</b> $0.00<br>
                <h4><b>Total:</b> ${{ $order->total }}</h4><br>
                <!-- end of display cost totals -->
                </div><!--end of products row-->
            </div></div>
       <hr>
@endforeach
<!-- Stuff I added -->
</div></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
