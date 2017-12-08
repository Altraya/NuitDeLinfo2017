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

function getAerial(){
    //$('#modal1').modal('open');
    if(typeof airBusParams.initialResolution === "undefined" || typeof airBusParams.originShift === "undefined"){
        initAirbus(256);
    }
    LatLonToMeters(getCurrentLat(),getCurrentLon());
    console.log(requestAirBusData(4));
}

function initAirbus(tileSize){
        if(tileSize.isUndefined){
            tileSize = 256;
        }
        //Initialize the TMS Global Mercator pyramid
        airBusParams.tileSize = tileSize
        airBusParams.initialResolution = 2 * Math.PI * 6378137 / airBusParams.tileSize;
        //156543.03392804062 for tileSize 256 pixels
        airBusParams.originShift = 2 * Math.PI * 6378137 / 2.0
        //20037508.342789244
}      
function LatLonToMeters(lat, lon ){
        //Converts given lat/lon in WGS84 Datum to XY in Spherical Mercator EPSG:900913

        airBusParams.mx = lon * airBusParams.originShift / 180.0;
        airBusParams.my = Math.log( Math.tan((90 + lat) * Math.PI / 360.0 )) / (Math.PI / 180.0);

        airBusParams.my = airBusParams.my * airBusParams.originShift / 180.0;
}
function requestAirBusData(zoom){
    
    var request = "http://sandbox.intelligence-airbusds.com/tiles/" + key + "/" + zoom +"/" + airBusParams.mx + "/" +airBusParams.my;
    return request;
}