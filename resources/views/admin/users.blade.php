@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
  <li class="active">User Management</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-16 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">User Index</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
                    <div class="row" style="width: 100%; text-align: center;">
                        @foreach($users as $user)
                        <div class="col-md-12">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                {{ stripslashes($user->name) }}
                                </div>
                                <div class="panel-body">
                                  <div style="margin: 5px auto;">
                                    Email: {{ $user-> email}}
                                  </div>
                                  <div>
                                    <a href="#">Change User Email</a>
                                  </div>
                                  <div>
                                    <a href="#">Reset Password</a>
                                  </div>
                                  <div>
                                    <a href="./orders/{{$user->id}}">Manage User Orders</a>
                                  </div>
                                </div>
                            </div>                            
                        </div>
                      @endforeach            
                    </div>

<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
