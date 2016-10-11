@extends('layouts.app')

@section('scripts-head')
    <!-- Start of Scripts Added to Head Section -->
    <!-- Angular -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
   
    <!-- End of Scripts Added to Head Section -->
@endsection



@section('scripts-body')
    <!-- Start of Scripts Added to Body Section -->
  <script>
  var app = angular.module('myApp', []);
  
  </script>
    <!-- End of Scripts Added to Body Section -->
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <b>Map</b>
                    <div style="height: 500px; width: 500px;">{!! Mapper::render () !!}</div>

<!-- Stuff I added -->
<style>
table, th , td  {
  border: 1px solid grey;
  border-collapse: collapse;
  padding: 5px;
}
table tr:nth-child(odd) {
  background-color: #f1f1f1;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}
</style>

<div ng-app="myApp" ng-controller="customersCtrl"> 


</div>



<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
