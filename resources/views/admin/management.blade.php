@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="active">Admin Management</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Management</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
                    <div class="row" style="width: 100%; text-align: center;">


                        <div class="col-md-4">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading">Manage Users</div>
                                <div class="panel-body">
                                    <img src="{{asset('images/m_users.svg')}}" alt="User" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ action('AdminController@getAllUsers') }}" class="btn btn-default">Manage Users</a><br>                              
                                </div>
                            </div>                            
                        </div>
                        @if(Auth::user()->access() >= 2)
                        <div class="col-md-4">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div href="{{ url('/edit') }}" class="panel-heading">Manage Products</div>
                                <div class="panel-body">
                                    <img src="{{asset('images/m_products.svg')}}" alt="Admin" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ url('/admin/products') }}" class="btn btn-default">Manage Products</a><br>
                                </div>
                            </div>                            
                        </div>
                        @endif
                        <div class="col-md-4">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div href="{{ url('/edit') }}" class="panel-heading">View Stores</div>
                                <div class="panel-body">
                                    <img src="{{asset('images/m_stores.svg')}}" alt="Admin" style="width:180px; height:180px; margin: 5px;">
                                    <a href="{{ action('AdminController@getStores') }}" class="btn btn-default">View Stores</a><br>
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
