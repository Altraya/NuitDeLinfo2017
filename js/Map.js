//Map components
var map; //Main map var
var currentPositionMarker; //Current position of the user
var key = "DS_PHR1A_201307091049344_FR1_PX_E001N43_0615_01654";
var airBusParams ={};
var warnings = [];

$(function() {
    initMap(48.5638945,7.7590974,11);
    enableGeoTracking();
    $(".button-collapse").sideNav();
    loadWarning();
});


function loadWarning(){
    //Post à process.php
    $.ajax({
    		type: "POST",
    		url: "Api/Warning/read.php",
    		
    		success: function(data) {
    		    
    		    console.log(data);
    		    for(i = 0; i < data.length; i++){
    		        addWarning(data[i].idType[0].icon,data[i].name,data[i].info,data[i].lat,data[i].lon);
    		    }
    		}
    	
    });
}

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

function addWarning(icon,title,info,lat,lon){
    
    console.log(lat + " - " + lon);
    
    var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h3 id="firstHeading" class="firstHeading">'+title+'</h3>'+
            '<div id="bodyContent">'+
            '<p>'+info+'</p>'+
            '</div>'+
            '</div>';
            
    var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
    
    var icon = {
        url: 'images/'+icon+".png", // url
        scaledSize: new google.maps.Size(40, 35), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };
    
    var marker = new google.maps.Marker({
        map:map,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(lat, lon),
        icon: icon
    });
    
    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });

    warnings.push(marker); 
  
    
}

function Resolution(zoom){
        "Resolution (meters/pixel) for given zoom level (measured at Equator)"
        
        //return (2 * math.pi * 6378137) / (self.tileSize * 2**zoom)
        return airBusParams.initialResolution / (2**zoom);
}

function getAerial(){
    //$('#modal1').modal('open');
    if(typeof airBusParams.initialResolution === "undefined" || typeof airBusParams.originShift === "undefined"){
        initAirbus(256);
    }
    LatLonToMeters(getCurrentLat(),getCurrentLon());
    var pixel = MetersToPixels(4);
    console.log(requestAirBusData(4,pixel[0],pixel[1]));
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
function MetersToPixels(zoom){
               
        res = Resolution( zoom )
        px = (airBusParams.mx + airBusParams.originShift) / res
        py = (airBusParams.my + airBusParams.originShift) / res
        return [px, py]
}

function requestAirBusData(zoom,px,py){
    
    var request = "http://sandbox.intelligence-airbusds.com/tiles/" + key + "/" + zoom +"/" + px + "/" + py;
    return request;
}