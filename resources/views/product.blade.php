@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
<b>Inventory</b>
<br>
Product ID: {{ $product->id }} <br>
Product Name: {{ $product->productName }} <br>
Inventory Quantity: {{ $product->quantity }} <br>



<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
