var map;
function initialize() {
	
var myLatlng = new google.maps.LatLng(52.3555180,-1.1743200);
var edgeHill = new google.maps.LatLng(52.1135180,-1.4531970);


var minZoomLevel = 7;	//sets min zoom

var mapOptions = {
  zoom: 7,
  zoom: minZoomLevel,
  center: myLatlng,
  mapTypeId: google.maps.MapTypeId.TERRAIN
  
};

 map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
//restrict boundaries///////////////////////
	  
 var strictBounds = new google.maps.LatLngBounds(
     new google.maps.LatLng(49.819464, -3.624982), 
     new google.maps.LatLng(56.190733, 1.121112)
   );
   
 google.maps.event.addListener(map, 'dragend', function() {
     if (strictBounds.contains(map.getCenter())) return;

     // We're out of bounds - Move the map back within the bounds

     var c = map.getCenter(),
         x = c.lng(),
         y = c.lat(),
         maxX = strictBounds.getNorthEast().lng(),
         maxY = strictBounds.getNorthEast().lat(),
         minX = strictBounds.getSouthWest().lng(),
         minY = strictBounds.getSouthWest().lat();

     if (x < minX) x = minX;
     if (x > maxX) x = maxX;
     if (y < minY) y = minY;
     if (y > maxY) y = maxY;

     map.setCenter(new google.maps.LatLng(y, x));
   });
   
    google.maps.event.addListener(map, 'zoom_changed', function() {
     if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
   }); 

//stylers/////////////////////////////////////////////////////////
 
  	var stylesOpt = [
  {
	  featureType: 'road',
	  stylers: [
	  {visibility: 'off'}
	]
  }
  ]
  map.setOptions({
	  styles: stylesOpt
  });
 ////////////////////////////////////////////////////////////////
 
var markerImage = 'icon.png'; 
var markerEdgeHill = new google.maps.Marker({
    position: edgeHill,
    map: map,
	icon: markerImage,
    title:"Hello World!"
});
}

google.maps.event.addDomListener(window, 'load', initialize);

