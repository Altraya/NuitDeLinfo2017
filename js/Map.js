//Map components
var map; //Main map var
var currentPositionMarker; //Current position of the user

//Starts a refresh every 10 seconds
function initGeoWatcher(){
    
    window.setInterval(function(){
        refreshPostion();
    }, 10000);
    
}

//Refreshes the position of the marker
function refreshPostion(){
    
    navigator.geolocation.getCurrentPosition(function(position) {
        
    var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };

    marker.setPosition(pos);

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
    	var image = {
    		url: '/src/common/icons/pegman_small.png',
    		// This marker is 20 pixels wide by 32 pixels high.
    		size: new google.maps.Size(50, 50),
    		// The origin for this image is (0, 0).
    		origin: new google.maps.Point(0, 0),
    		// The anchor for this image is the base of the flagpole at (0, 32).
    		anchor: new google.maps.Point(25, 50)
    	};
        currentPositionMarker = new google.maps.Marker({
            position: pos,
            map: map,
            icon: image,
            title: "Your position",
        });

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