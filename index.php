<html>
    <head>
        <title>English Civil War</title>
        <link rel="stylesheet" type="text/css" href="index.css"/>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <?php
        require'dbinfo.php';
        require 'gmaps/index.php';
        ?>


        <script type="text/javascript">


            function getDetails(str) {

                if (str == "") {

                    document.getElementById("leftPage").innerHTML = document.getElementById("homeContent").innerHTML;
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("leftPage").innerHTML = xmlhttp.responseText;
                        }
                    }
                    xmlhttp.open("GET", "index2.php?q=" + str, true);

                    xmlhttp.send();

                }
            }



        </script>




        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false"></script>
        <script type="text/javascript">

            var map;
            function initialize() {
                var mapCenter = new google.maps.LatLng(52.601316, -1.195585);




                var minZoomLevel = 7;	//sets min zoom
                var mapOptions = {
                    zoom: 7,
                    center: mapCenter,
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

                //dummy comment			
                /*********************************************************************************************************************/


<?php
for ($i = 0; $i < $numberOfBattles; $i++) {
    echo "    

                    var marker" . $battles[$i]["name"] . " = new google.maps.Marker({
                        position: new google.maps.LatLng(" . $battles[$i]["lat"] . "," . $battles[$i]["lng"] . "),
                        map: map,
                        icon: 'gmaps/icon.png'
                    });        
                            ";

    echo '  var infowindow' . $battles[$i]["name"] . ' = new google.maps.InfoWindow({
                       content: "<h1>  ' . $battles[$i]["battle_name"] . ' </h1> <p> <b>Belligerents: </b> ' . $battles[$i]["beligerents"] . ' </p> <p> <b>Outcome: </b> ' . $battles[$i]["outcome"] . ' </p> "               
                     });';
    echo "  
                     google.maps.event.addListener(marker" . $battles[$i]["name"] . ", 'click', function() {
                    getDetails(" . $battles[$i]["id"] . ");                    
                             });
                                             
                    google.maps.event.addListener(marker" . $battles[$i]["name"] . ", 'mouseover', function() {
                    infowindow" . $battles[$i]["name"] . ".open(map, marker" . $battles[$i]["name"] . ");
                });
                
                    google.maps.event.addListener(marker" . $battles[$i]["name"] . ", 'mouseout', function() {
                    infowindow" . $battles[$i]["name"] . ".close(map, marker" . $battles[$i]["name"] . ");
                });
                ";
}
?>




                /*********************************************************************************************************************/

            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>

    <body onload='getDetails("")' style=" background-image: url('images/background.jpg'); background-size: 100%, 100%; ">
        <!-- wrapper class  -->
        <div class="wrapper" >


            <div class="book" style="background-image:url('images/book.png'); ">

            </div> 
            <div class="nav_bar">
                <a id="home" href="#" onclick='getDetails("")'>Home</a>
                <a id="azham" target="_blank" href="http://www.cems.uwe.ac.uk/~tam2-naphiel/dsa/api">Azham</a>
                <a id="hannad" target="_blank" href="http://www.cems.uwe.ac.uk/~h3-hussein/individual/MySample.php">Hannad</a>
                <a id="josh" target="_blank" href="#">Josh</a>
                <a id="kayne" target="_blank" href="http://www.cems.uwe.ac.uk/~k2-goes/dsa/TwitterAPI/">Kayne</a>
                 <a id="rss" target="_blank" href="http://www.cems.uwe.ac.uk/~tam2-naphiel/dsa/rss">RSS</a>
            </div>
            <div class="leftPage" id="leftPage" >
               


            </div>


            <div class="api_container">

                <div id ="map-canvas" class="api">     </div>
            </div>



            <!--            <div class="footer">This is the footer</div>-->
        </div>
        <div style="visibility: hidden;" id="homeContent">
            <h1>
                DSA Assignment
            </h1>

            <h3>Group Members</h3>
            <h5>Azham Naphiel - 14000853</h5>
            <h5>Hannad Hussein - 13020803</h5>
            <h5>Josh Thornell - 13023117</h5>
            <h5>Kayne Goes - 13005652</h5>
        </div>
    </body>

</html>