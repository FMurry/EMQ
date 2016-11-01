@extends('layouts.app')


@section('scripts-head')
    <!-- Start of Scripts Added to Head Section -->
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #warnings-panel {
        width: 100%;
        height:10%;
        text-align: center;
      }
      #floating-panel2 {
  position: absolute;
  bottom: 30px;
  left: 7%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  //text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

      #floating-panel2 {
        margin-left: -52px;
      }
    </style>
    <!-- End of Scripts Added to Head Section -->
@endsection



@section('scripts-body')
    <!-- Start of Scripts Added to Body Section -->

    <!-- End of Scripts Added to Body Section -->
@endsection

@section('content')
<ol class="breadcrumb">
  <li><a href="http://localhost/emq/public/account">Account Management</a></li>
  <li><a href="http://localhost/emq/public/account/orders">Order History</a></li>
  <li class="active">Order Tracking</li>
</ol>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Order Tracking</div>

                <div class="panel-body">
                    

<!-- Stuff I added -->
 
    <!-- MASTER VALUES TO BE POPULATED BY BACK END -->
    <input type="hidden" id="start" name="Store" value="{{ $store_address }}">
    <input type="hidden" id="end" name="Home" value="{{ $customer_address }}">
    <input type="hidden" id="elapsed_order_time" name="Delivery" value="{{ $current_delivery_time }}"><!-- in seconds -->


    <!-- start of LEGEND -->
    <div id="floating-panel2">
      <form>
       <fieldset>
        <legend>Legend</legend>
        <table>
          <tr>
            <td><center>
        <img src='http://findicons.com/files/icons/2455/web_icons/48/shop.png'></center></td><td> EMQ Store</td></tr>
        <tr><td><center><img src='http://findicons.com/files/icons/2166/oxygen/48/go_home.png'></td><td> Customers Home</td></tr>
        <tr><td><center><img src='http://findicons.com/files/icons/1496/world_of_copland_2/32/fedex_truck.png'></center></td><td> Delivery Truck</td></tr>
      </table>
       </fieldset>
      </form>
     </div>
     <!-- end of LEGEND -->
    <div id="map" style="width: 100%; height: 500px; position: relative; overflow;"></div>
    &nbsp;
    <div id="warnings-panel"></div>

            <center></a>&nbsp;&nbsp;&nbsp;<a href="{{ action('OrderController@returnOrderHistory') }}" class="btn btn-primary">Return to Order History</a>&nbsp;&nbsp;&nbsp;<a href="{{ action('HomeController@index') }}" class="btn btn-default">Continue Shopping</a></center>
    <script>
      function initMap() {
        var markerArray = [];

        // Instantiate a directions service.
        var directionsService = new google.maps.DirectionsService;


        // Create a map and center it on Manhattan.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 40.771, lng: -73.974}
        });


        // Create a renderer for directions and bind it to the map.
        var directionsDisplay = new google.maps.DirectionsRenderer({map: map,
          suppressMarkers: true});

        // Instantiate an info window to hold step text.
        var stepDisplay = new google.maps.InfoWindow;

        // Display the route between the initial start and end selections.
        calculateAndDisplayRoute(
            directionsDisplay, directionsService, markerArray, stepDisplay, map);
        // Listen to change events from the start and end lists.
        var onChangeHandler = function() {
          calculateAndDisplayRoute(
              directionsDisplay, directionsService, markerArray, stepDisplay, map);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsDisplay, directionsService,
          markerArray, stepDisplay, map) {
        // First, remove any existing markers from the map.
        for (var i = 0; i < markerArray.length; i++) {
          markerArray[i].setMap(null);
        }

        // Retrieve the start and end locations and create a DirectionsRequest using
        // WALKING directions.
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          // Route the directions and pass the response to a function to create
          // markers for each step.
          if (status === 'OK') {
            document.getElementById('warnings-panel').innerHTML =
                '<b>' + response.routes[0].warnings + '</b>';

            /* Displays blue route */
            directionsDisplay.setDirections(response);
            /* Drops Location Pins */
            showSteps(response, markerArray, stepDisplay, map);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

      function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.

        var running_time = 0; //debugging

        /* This value will be provided by the backend, it's the elapsed time (in seconds) since the order occured */
        var current_time = document.getElementById('elapsed_order_time').value;//400;//debugging

        var trigger = true;

        console.log( directionResult.routes[0].legs[0].end_location );//debugging


        /* START OF DRAW STORE AND HOUSE MARKERS */
          var marker = markerArray[0] = markerArray[0] || new google.maps.Marker({ 
            icon: 'http://findicons.com/files/icons/2455/web_icons/48/shop.png'});
          marker.setMap(map);
        marker.setPosition(directionResult.routes[0].legs[0].start_location);
        attachInstructionText(
        stepDisplay, marker, "STORE", map);

        var marker = markerArray[1] = markerArray[1] || new google.maps.Marker({ 
        icon: 'http://findicons.com/files/icons/2166/oxygen/48/go_home.png'});
        marker.setMap(map);
        marker.setPosition(directionResult.routes[0].legs[0].end_location);
        attachInstructionText(
        stepDisplay, marker, "HOUSE", map);

        /* END OF DRAW STORE AND HOUSE MARKERS */

        var myRoute = directionResult.routes[0].legs[0];

        for (var i = 0; i < myRoute.steps.length; i++) {
          var marker = markerArray[2] = markerArray[2] || new google.maps.Marker({ 
            icon: 'http://findicons.com/files/icons/1496/world_of_copland_2/32/fedex_truck.png'});
          marker.setMap(map);
          

          //console.log( myRoute.steps[i].start_location.lat() +" " + myRoute.steps[i].start_location.lng());//debugging
          console.log( myRoute.steps[i].duration );//debugging
          //console.log( myRoute.steps[i].start_location.lat() );//debugging
          running_time += myRoute.steps[i].duration.value;//debugging
          console.log( "running_time: "+running_time);//debugging



          if( running_time > current_time && i == 0){
            console.log("Event triggered: ("+ i +") truck has not reached first checkpoint.");
            break;
          }else if(running_time > current_time && i > 0){
            console.log("Event triggered: ("+ i +") " + running_time);
            marker.setPosition(myRoute.steps[i-1].end_location);
            attachInstructionText(
              stepDisplay, marker, "Delivery Truck", map);
            break;
          }
          
          //ORIGINAL CODE
          /* 
          marker.setPosition(myRoute.steps[i].start_location);
          attachInstructionText(
              stepDisplay, marker, myRoute.steps[i].instructions, map);
          */
        }
      }

      function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
          // Open an info window when the marker is clicked on, containing the text
          // of the step.
          stepDisplay.setContent(text);
          stepDisplay.open(map, marker);
        });
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9w50w7aMqhmPQK8ukCVbTbLgnw7xkAus&signed_in=true&libraries=places&callback=initMap"></script>
<!-- Stuff I added -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
