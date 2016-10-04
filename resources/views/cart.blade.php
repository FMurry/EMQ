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
  app.controller('customersCtrl', function($scope, $http) {
      $http.get("http://localhost/emq/public/api?data=products")
      .then(function (response) {$scope.names = response.data.products;});
      $scope.count = 0;
      $scope.counter = function(){
        $scope.count++;
      };
      $scope.itemsTest = function(){
        $scope.items = $scope.items.concat(names[count]);
      };
  });
  </script>
    <!-- End of Scripts Added to Body Section -->
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cart</div>

                <div class="panel-body">

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

    <p>Click the button:</p>

    <button ng-click="count = count + 1">OK</button>

    <p>The button has been clicked @{{count}} times.</p>


    <table>
        <tr><!--<th>#</th>--><th>Qty</th><th>Product</th></tr>
      <tr ng-repeat="x in items">
        <!--<td>@{{ $index + 1 }}</td>-->
        <td>@{{ x.quantity }}</td>
        <td>@{{ x.productName }}</td>
      </tr>
    </table>

</div>



<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection