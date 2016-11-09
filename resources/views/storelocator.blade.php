@extends('layouts.app')

@section('scripts-head')
    <!-- Start of Scripts Added to Head Section -->
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
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }
    </style>
    <!-- End of Scripts Added to Head Section -->
    <!-- End of Scripts Added to Head Section -->
@endsection



@section('scripts-body')
    <!-- Start of Scripts Added to Body Section -->
    <!-- End of Scripts Added to Body Section -->
@endsection


@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading">Store Locator</div>
                  <div id="map" style="width: 100%; height: 500px; position: relative; overflow;"></div>
                  <script>
                    var stores = [
                          [37.349815, -121.960438],
                          [37.305341, -121.863068],
                          [37.670500, -122.471026],
                          [37.475663, -122.217060],
                          [37.817325, -122.245677],
                          [37.501622, -121.968116],
                          [36.961314, -122.045105],
                          [36.915174, -121.773818],
                          [37.978267, -122.028256],
                          [37.904429, -122.064699],
                          [37.784736, -122.403691],
                          [37.719935, -122.438977]
                      ];
                    var markers = [];
                    var map;
                    function initMap(){
                      // Create a map and center it on SJSU.
                      map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 9,
                        center: {lat: 37.635, lng: -121.881}
                      });
                      var infowindow = new google.maps.InfoWindow;
                      var geocoder = new google.maps.Geocoder;

                      for (var i = 0; i < stores.length; i++) {
                        //large delay to make up for geocoding requests to go through
                        addMarkerWithTimeout(stores[i], i * 100, infowindow, geocoder);
                      }

                    }
                    function addMarkerWithTimeout(store, timeout, infowindow, geocoder) {
                      //geocoder function commented out for now, doesn't display the address even with full sig. figs
                      window.setTimeout(function() {
                        /*geocoder.geocode({'location': position}, function(results, status) {
                          if (status === 'OK') {
                            if (results[1]) {*/
                              var location = new google.maps.LatLng(store[0], store[1]);
                              var location_text = store[0] + ", " + store[1];
                              var marker = new google.maps.Marker({
                                position: location,
                                map: map,
                                animation: google.maps.Animation.DROP
                              });
                              google.maps.event.addListener(marker, 'click', function() {
                                // Open an info window when the marker is clicked on, containing the text
                                // of the step.
                                //infowindow.setContent(results[1].formatted_address);
                                infowindow.setContent(location_text);
                                infowindow.open(map, marker);
                              });
                              markers.push(marker);
                            /*} else {
                              window.alert('No results found');
                            }
                          } else {
                            window.alert('Geocoder failed due to: ' + status);
                          }
                        });*/
                      }, timeout);    
                    }
                  </script>
                  <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMM6EkVGKo91UtYnDnC_fGkOActvJqW2c&libraries=places&callback=initMap">
                  </script>

<!-- Stuff I added -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
