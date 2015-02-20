<html>
    <head>
        <title>English Civil War</title>
        <link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
 <?php

require'dbinfo.php';

$sql = "SELECT * FROM battle";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
//test
$lngArray = array();
$index = 0;

while($row = mysqli_fetch_array($result)){
	$Array[$index] = $row;
	$index ++;
}

} else {
    echo "0 results";
}
$conn->close();

?>

<?php

require'dbinfo.php';

$sql = "SELECT battle_name, name FROM battle, leaders, battleLeaders WHERE battle_id = battle_battle_id AND name_id = leaders_name_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
//test
//$lngArray = array();
//$index = 0;

		while($row = $result->fetch_assoc()) {
        echo  "Name: " . $row["name"].  "battle: " . $row["battle_name"]. "<br>";
    }


/* while($row = mysqli_fetch_array($result)){
	$Array[$index] = $row;
	//$index ++;
}
 */
} 
else {
    echo "0 results";
}
$conn->close();

?>






   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
    <script type="text/javascript">
                var map;
                function initialize() {
                    var myLatlng = new google.maps.LatLng(52.601316, -1.195585);
					 
					 var edgeHill = new google.maps.LatLng(<?php echo json_encode($Array[0]["lat"]); ?> , <?php echo json_encode($Array[0] ["lng"]); ?>);
					 var marstonMoor = new google.maps.LatLng(<?php echo json_encode($Array[1]["lat"]); ?> , <?php echo json_encode($Array[1] ["lng"]); ?>);
					 var Newbury = new google.maps.LatLng(<?php echo json_encode($Array[2]["lat"]); ?> , <?php echo json_encode($Array[2] ["lng"]); ?>);
					 var Newbury2 = new google.maps.LatLng(<?php echo json_encode($Array[3]["lat"]); ?> , <?php echo json_encode($Array[3] ["lng"]); ?>);
					 var Naseby = new google.maps.LatLng(<?php echo json_encode($Array[4]["lat"]); ?> , <?php echo json_encode($Array[4] ["lng"]); ?>);
					 var Torrington = new google.maps.LatLng(<?php echo json_encode($Array[5]["lat"]); ?> , <?php echo json_encode($Array[5] ["lng"]); ?>);
						
					 var titleEdgeHill =(<?php echo json_encode($Array[0]["battle_name"]); ?>);
					 var titleMarstonMoor =(<?php echo json_encode($Array[1]["battle_name"]); ?>);
					 var titleNewbury =(<?php echo json_encode($Array[2]["battle_name"]); ?>);
					 var titleNewbury2 =(<?php echo json_encode($Array[3]["battle_name"]); ?>);
					 var titleNaseby =(<?php echo json_encode($Array[4]["battle_name"]); ?>);
					 var titleTorrington =(<?php echo json_encode($Array[5]["battle_name"]); ?>);
					 
					 var descEdgeHill =(<?php echo json_encode($Array[0]["description"]); ?>);
					 var descMarstonMoor =(<?php echo json_encode($Array[1]["description"]); ?>);
					 var descNewbury =(<?php echo json_encode($Array[2]["description"]); ?>);
					 var descNewbury2 =(<?php echo json_encode($Array[3]["description"]); ?>);
					 var descNaseby =(<?php echo json_encode($Array[4]["description"]); ?>);
					 var descTorrington =(<?php echo json_encode($Array[5]["description"]); ?>);
					 
					 var belEdgeHill =(<?php echo json_encode($Array[0]["Beligerents"]); ?>);
					 var belMarstonMoor =(<?php echo json_encode($Array[1]["Beligerents"]); ?>);
					 var belNewbury =(<?php echo json_encode($Array[2]["Beligerents"]); ?>);
					 var belNewbury2 =(<?php echo json_encode($Array[3]["Beligerents"]); ?>);
					 var belNaseby =(<?php echo json_encode($Array[4]["Beligerents"]); ?>);
					 var belTorrington =(<?php echo json_encode($Array[5]["Beligerents"]); ?>);
					 
					 var outcomeEdgeHill =(<?php echo json_encode($Array[0]["outcome"]); ?>);
					 var outcomeMarstonMoor =(<?php echo json_encode($Array[1]["outcome"]); ?>);
					 var outcomeNewbury =(<?php echo json_encode($Array[2]["outcome"]); ?>);
					 var outcomeNewbury2 =(<?php echo json_encode($Array[3]["outcome"]); ?>);
					 var outcomeNaseby =(<?php echo json_encode($Array[4]["outcome"]); ?>);
					 var outcomeTorrington =(<?php echo json_encode($Array[5]["outcome"]); ?>);
					 
					 
					 
					 
                   
				   var minZoomLevel = 7;	//sets min zoom
                    var mapOptions = {
                        zoom: 7,
                        center: myLatlng,
                        disableDefaultUI: true,
                        panControl: false,
                        mapTypeId: google.maps.MapTypeId.TERRAIN
                    };
                    map = new google.maps.Map(document.getElementById('map-canvas'),
                            mapOptions);
                    //restrict boundaries///////////////////////
                    var strictBounds = new google.maps.LatLngBounds(
                            new google.maps.LatLng(50.738281, -3.652526),
                            new google.maps.LatLng(55.081956, 0.427984)
                            );
                    google.maps.event.addListener(map, 'drag', function() {
                        if (strictBounds.contains(map.getCenter()))
                            return;
                        // We're out of bounds - Move the map back within the bounds
                        var c = map.getCenter(),
                                x = c.lng(),
                                y = c.lat(),
                                maxX = strictBounds.getNorthEast().lng(),
                                maxY = strictBounds.getNorthEast().lat(),
                                minX = strictBounds.getSouthWest().lng(),
                                minY = strictBounds.getSouthWest().lat();
                        if (x < minX)
                            x = minX;
                        if (x > maxX)
                            x = maxX;
                        if (y < minY)
                            y = minY;
                        if (y > maxY)
                            y = maxY;
                        map.setCenter(new google.maps.LatLng(y, x));
                    });
                    google.maps.event.addListener(map, 'zoom_changed', function() {
                        if (map.getZoom() < minZoomLevel)
                            map.setZoom(minZoomLevel);
                    });
                    //stylers/////////////////////////////////////////////////////////
                    var stylesOpt = [
                        {
                            featureType: 'road',
                            stylers: [
                                {visibility: 'off'}
                            ]
                        },
                        {
                            featureType: 'poi',
                            stylers: [
                                {visibility: 'off'}
                            ]
                        },
                        {
                            featureType: 'administrative',
                            stylers: [
                                {visibility: 'off'}
                            ]
                        },
                        {
                            featureType: 'transit',
                            stylers: [
                                {visibility: 'off'}
                            ]
                        },
                        {
                            featureType: 'landscape.man_made',
                            stylers: [
                                {visibility: 'off'}
                            ]
                        },
                        {
                            featureType: 'water',
                            elementType: 'geometry',
                            stylers: [
                                
                                {color: "#b6986c"},
                                //{lightness: 5}
                            ]
                        },
                        {
                            featureType: 'landscape',
                            elementType: 'all',
                            stylers: [
                                {color: "#55200e"},
                              //  {lightness: 5}
                            ]
                        }
                    ]
                    map.setOptions({
                        styles: stylesOpt
                    });
                    ////////////////////////////////////////////////////////////////
                    var markerEdgeHill = new google.maps.Marker({
                        position: edgeHill,
                        map: map,
                        icon: 'gmaps/icon.png',
                      
                    });
					    var markerMarstonMoor = new google.maps.Marker({
                        position: marstonMoor,
                        map: map,
                        icon: 'gmaps/icon.png',
                       
                    });
					var markerNewbury = new google.maps.Marker({
                        position: Newbury,
                        map: map,
                        icon: 'gmaps/icon.png',
                        
                    });
					var markerNewbury2 = new google.maps.Marker({
                        position: Newbury2,
                        map: map,
                        icon: 'gmaps/icon.png',
                       
                    });
					
					var markerNaseby = new google.maps.Marker({
                        position: Naseby,
                        map: map,
                        icon: 'gmaps/icon.png',
                       
                    });
					var markerTorrington = new google.maps.Marker({
                        position: Torrington,
                        map: map,
                        icon: 'gmaps/icon.png',
                     
                    });
					
		//dummy comment			
	/*********************************************************************************************************************/					
                    var infowindow = new google.maps.InfoWindow({
                        content: "<h1> "+ titleEdgeHill+" </h1>" + 
						"<p> <b>Battle Description: </b>" +descEdgeHill+ " </p>"  +
						"<p> <b>Belligerents: </b>" +belEdgeHill+ " </p>"  +
						"<p> <b>Outcome: </b>" +outcomeEdgeHill+ " </p>" ,
								
						
                    });
				
                    google.maps.event.addListener(markerEdgeHill, 'mouseover', function() {
                        infowindow.open(map, markerEdgeHill);
					
                    });
                      google.maps.event.addListener(markerEdgeHill, 'mouseout', function() {
                        infowindow.close(map, markerEdgeHill);
						
                    
                    });
	/*********************************************************************************************************************/					
                    var infowindowMarstonMoor = new google.maps.InfoWindow({
                        content: "<h1> "+ titleMarstonMoor+" </h1>" + 
						"<p> <b>Battle Description: </b>" +descMarstonMoor+ " </p>"  +
						"<p> <b>Belligerents: </b>" +belMarstonMoor+ " </p>"  +
						"<p> <b>Outcome: </b>" +outcomeMarstonMoor+ " </p>"  
                    });
				
                    google.maps.event.addListener(markerMarstonMoor, 'mouseover', function() {
                        infowindowMarstonMoor.open(map, markerMarstonMoor);
					
                    });
                      google.maps.event.addListener(markerMarstonMoor, 'mouseout', function() {
                        infowindowMarstonMoor.close(map, markerMarstonMoor);
						
                    
                    });
	/*********************************************************************************************************************/				
                    var infowindowNewbury = new google.maps.InfoWindow({
                        content: "<h1> "+ titleNewbury+" </h1>" +
						"<p> <b>Battle Description: </b>" +descNewbury+ " </p>"  +
						"<p> <b>Belligerents: </b>" +belNewbury+ " </p>"  +
						"<p> <b>Outcome: </b>" +outcomeNewbury+ " </p>"  
                    });
				
                    google.maps.event.addListener(markerNewbury, 'mouseover', function() {
                        infowindowNewbury.open(map, markerNewbury);
					
                    });
                      google.maps.event.addListener(markerNewbury, 'mouseout', function() {
                        infowindowNewbury.close(map, markerNewbury);
						
                    
                    });
	/*********************************************************************************************************************/	
	                    var infowindowNewbury2 = new google.maps.InfoWindow({
                        content: "<h1> "+ titleNewbury2+" </h1>" + 
						"<p> <b>Battle Description: </b>" +descNewbury2+ " </p>" +
							"<p> <b>Belligerents: </b>" +belNewbury2+ " </p>"  +
						"<p> <b>Outcome: </b>" +outcomeNewbury2+ " </p>" 
                    });
				
                    google.maps.event.addListener(markerNewbury2, 'mouseover', function() {
                        infowindowNewbury2.open(map, markerNewbury2);
					
                    });
                      google.maps.event.addListener(markerNewbury2, 'mouseout', function() {
                        infowindowNewbury2.close(map, markerNewbury2);
						
                    
                    });
	/*********************************************************************************************************************/	
	      var infowindowNaseby = new google.maps.InfoWindow({
                        content: "<h1> "+ titleNaseby+" </h1>" +
						"<p> <b>Battle Description: </b>" +descNaseby+ " </p>" +
							"<p> <b>Belligerents: </b>" +belNaseby+ " </p>"  +
						"<p> <b>Outcome: </b>" +outcomeNaseby+ " </p>" 
                    });
				
                    google.maps.event.addListener(markerNaseby, 'mouseover', function() {
                        infowindowNaseby.open(map, markerNaseby);
					
                    });
                      google.maps.event.addListener(markerNaseby, 'mouseout', function() {
                        infowindowNaseby.close(map, markerNaseby);
						
                    
                    });
	/*********************************************************************************************************************/	
	   var infowindowTorrington = new google.maps.InfoWindow({
                        content: "<h1> "+ titleTorrington+" </h1>" +
						"<p> <b>Battle Description: </b>" +descTorrington+ " </p>"+
						"<p> <b>Belligerents: </b>" +belTorrington+ " </p>"  +
						"<p> <b>Outcome: </b>" +outcomeTorrington+ " </p>" 
                    });
				
                    google.maps.event.addListener(markerTorrington, 'mouseover', function() {
                        infowindowTorrington.open(map, markerTorrington);
					
                    });
                      google.maps.event.addListener(markerTorrington, 'mouseout', function() {
                        infowindowTorrington.close(map, markerTorrington);
						
                    
                    });
	/*********************************************************************************************************************/	
                    
                }
                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
    </head>
    
    <body style=" background-image: url('images/background.jpg'); background-size: 100%, 100%; ">
        <!-- wrapper class  -->
        <div class="wrapper" >
          

             <div class="book" style="background-image:url('book.png');">
                
            </div> 
          
               <div class="battleList">
               
                
            </div>

        
<div class="api_container">
   
    <div id ="map-canvas" class="api">     </div>
</div>


            
<!--            <div class="footer">This is the footer</div>-->
        </div>
    </body>
    
</html>