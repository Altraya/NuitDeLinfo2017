//Map components
var map; //Main map var
var currentPositionMarker; //Current position of the user

$(function() {
    initMap(48.5638945,7.7590974,11);
    enableGeoTracking();
});

//Starts a refresh every 10 seconds
function initGeoWatcher(){
    
    window.setInterval(function(){
        refreshPostion();
    }, 10000);
    
}

//Refreshes the position of the marker
function refreshPostion(){
    
    navigator.geolocation.getCurrentPosition(function(position) {
        
    console.log(position.coords.latitude + " - " + position.coords.longitude);
        
    var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };

    currentPositionMarker.setPosition(pos);

    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
    
}

//Initializes the map this the different parameters
function initMap(lat,lon,zoom){
    
    var defaultPosition = new google.maps.LatLng(lat,lon);
    
    map = new google.maps.Map(document.getElementById("llama_map"), {
		zoom: zoom,
		center: defaultPosition,
		mapTypeId: google.maps.MapTypeId.TERRAIN,
		disableDefaultUI: true
	}); 
	
	google.maps.event.addListener(map, 'zoom_changed', function() {
	    
	    //Zoom changed
	    
	});
    
}

function enableGeoTracking(){

  if (navigator.geolocation) {
      
    navigator.geolocation.getCurrentPosition(function(position) {
            
        var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        currentPositionMarker = new google.maps.Marker({
            position: pos,
            map: map,
            title: "Your position",
        });
        
        initGeoWatcher();

    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
    
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }

}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  alert("REFUSED");
}