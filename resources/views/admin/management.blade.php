@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="active">Admin Management</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Management</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
                    <div class="row" style="width: 100%; text-align: center;">
                        <div class="col-md-3">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div href="{{ url('/edit') }}" class="panel-heading">Manage Admins</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/138/138669.svg" alt="Admin" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ url('/edit') }}" class="btn btn-default">Manage Admins</a><br>
                                </div>
                            </div>                            
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading">Manage User</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/138/138669.svg" alt="User" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ action('AdminController@getAllUsers') }}" class="btn btn-default">Manage User</a><br>                              
                                </div>
                            </div>                            
                        </div>

                        <div class="col-md-3">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div href="{{ url('/edit') }}" class="panel-heading">Manage Stores</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/138/138669.svg" alt="Admin" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ action('AdminController@getStores') }}" class="btn btn-default">Manage Stores</a><br>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div href="{{ url('/edit') }}" class="panel-heading">Manage Products</div>
                                <div class="panel-body">
                                    <img src="http://image.flaticon.com/icons/svg/138/138669.svg" alt="Admin" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ url('/admin/products') }}" class="btn btn-default">Manage Products</a><br>
                                </div>
                            </div>                            
                        </div>

                    </div>

<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
