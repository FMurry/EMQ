@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Order Completed</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
Completing order is still under development.<br><br>
JSON<br>
{{ $OrderData }}
<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
