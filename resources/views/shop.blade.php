@extends('layouts.app')

@section('scripts-head')
    <!-- Start of Scripts Added to Head Section -->
    <html lang="en" ng-app="angularTable">
    <!-- End of Scripts Added to Head Section -->
@endsection



@section('scripts-body')
    <!-- Start of Scripts Added to Body Section -->
     <script src="{{asset('/lib/angular/angular.js')}}"></script>
    <script src="{{asset('/lib/dirPagination.js')}}"></script>

    <script>
var app = angular.module('angularTable', ['angularUtils.directives.dirPagination']);

app.controller('listdata',function($scope, $http){
  $scope.products = []; //declare an empty array
  $http.get("{{asset('/api?data=products')}}").success(function(response){ 
    $scope.products = response.products;  //ajax request to fetch data into $scope.data
  });
  
  $scope.sort = function(keyname){
    $scope.sortKey = keyname;   //set the sortKey to the param passed
    $scope.reverse = !$scope.reverse; //if true make it false and vice versa
  }
});
    </script>

    <!-- End of Scripts Added to Body Section -->
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Shop</div>

                <div class="panel-body">

<!-- Stuff I added -->
                  
                  <div class="bs-component" ng-controller="listdata">

                    <form class="form-inline">
                      <div class="form-group">

                          <div style="margin: 5px;">
                            <label >Search</label>

                            <input type="text" ng-model="search2" class="form-control" placeholder="EMQ" size="85">          
                          </div>

                          <div style="margin: 5px;">
                            <label >Category</label>

                            <select name="category" ng-model="search1" class="form-control">
                              <option value="" selected="selected">All Products</option>
                              <option value="PC & Accessories">PC & Accessories</option>
                              <option value="Category 2">Category 2</option>
                              <option value="Category 3">Category 3</option>
                            </select>
                            
                          </div>                        

                      </div>
                    </form>

                    <div class="row" style="margin-top:10px;margin-left:8px; margin-right:10px; text-align: center;">
                      
                        <div class="col-md-4" dir-paginate="product in products|orderBy:sortKey:reverse|filter:search1|filter:search2|itemsPerPage:6">
                            <div class="panel panel-warning" style="margin: 10px;">
                                <div class="panel-heading" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                @{{ product.productName }}
                                </div>
                                <div class="panel-body">
                                  <div style="margin: 5px auto;">
                                    <img src="http://localhost/emq/public/product_images/@{{ product.image }}" alt="..." style="max-height: 100px;">
                                    <!-- <img src="@{{asset('public/product_images/' . product.image)}}" alt="..." style="max-height: 100px;"> -->
                                                                   
                                  </div>
                                  <div>
                                    <a href="./product/@{{ product.id }}" class="btn btn-default">View Item</a>
                                  </div>
                                </div>
                            </div>                            
                        </div>
                   
                    </div>

        <center><dir-pagination-controls
          max-size="5"
          direction-links="true"
          boundary-links="true" >
        </dir-pagination-controls></center>
      </div>
                  <!--</div>-->



<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
