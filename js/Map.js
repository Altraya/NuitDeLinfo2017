//Map components
var map; //Main map var
var currentPositionMarker; //Current position of the user
var key = "DS_PHR1A_201307091049344_FR1_PX_E001N43_0615_01654";
var airBusParams ={};

$(function() {
    initMap(48.5638945,7.7590974,11);
    enableGeoTracking();
    $(".button-collapse").sideNav();
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

function showSidePanel(){
    $('.button-collapse').sideNav('show');
}

function getCurrentLat(){
    return map.getCenter().lat();
}

function getCurrentLon(){
    return map.getCenter().lng();
}

function getZoom(){
    return map.getZoom();
}

function initAirbus(tileSize){
        if(tileSize.isUndefined){
            tileSize = 256;
        }
        //Initialize the TMS Global Mercator pyramid
        airBusParams.tileSize = tileSize
        airBusParams.initialResolution = 2 * math.pi * 6378137 / airBusParams.tileSize;
        //156543.03392804062 for tileSize 256 pixels
        airBusParams.originShift = 2 * math.pi * 6378137 / 2.0
        //20037508.342789244
}      
function LatLonToMeters(lat, lon ){
        //Converts given lat/lon in WGS84 Datum to XY in Spherical Mercator EPSG:900913

        airBusParams.mx = lon * airBusParams.originShift / 180.0;
        airBusParams.my = math.log( math.tan((90 + lat) * math.pi / 360.0 )) / (math.pi / 180.0);

        airBusParams.my = airBusParams.my * airBusParams.originShift / 180.0;
}
function requestAirBusData(zoom){
    
    var request = "http://sandbox.intelligence-airbusds.com/tiles/" + key + "/" + zoom +"/" + airBusParams.mx + "/" +airBusParams.my;
    
}