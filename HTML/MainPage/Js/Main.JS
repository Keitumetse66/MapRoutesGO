/*function initMap();

 $(() => {
  initMap = function() {
   google.maps.visualRefresh = true;

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: { lat: -25.731340, lng: 28.218370 }
}
      
  });

  var directionsService = new google.maps.DirectionsService();

  var directionsDisplay = new google.maps.DirectionsRenderer({
    map: map
  });

  var geocoder = new google.maps.Geocoder();

  var pointA, pointB;


  geocoder.geocode({
    'address': document.getElementById('addressFrom').value
  }, function(results, status) {
    if (status != "OK") return;
    var location = results[0].geometry.location;
    pointA = new google.maps.LatLng(location.lat(), location.lng());
    alert(location.lat() + ',' + location.lng());
    var markerA = new google.maps.Marker({
      position: pointA,
      title: "point A",
      label: "A",
      map: map
    });
    geocoder.geocode({
      'address': document.getElementById('addressTo').value
    }, function(results, status) {
      if (status != "OK") return;
      var location = results[0].geometry.location;
      pointB = new google.maps.LatLng(location.lat(), location.lng());
      alert(location.lat() + ',' + location.lng());
      var markerB = new google.maps.Marker({
        position: pointB,
        title: "point B",
        label: "B",
        map: map
      });
      calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
    });
  });
};

function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
  directionsService.route({
    origin: pointA,
    destination: pointB,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
                          

    /*if (status == google.maps.DirectionsStatus.OK)
    {
      directionsDisplay.setDirections(response);
    } else
    {
      window.alert('Directions request failed due to ' + status);
    }*/
 /* });
}


}
*/