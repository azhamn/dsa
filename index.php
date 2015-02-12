<html>
    <head>
        <title>English Civil War</title>
        <link rel="stylesheet" type="text/css" href="css/index.css"/>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script type="text/javascript">
                var map;
                function initialize() {

                    var myLatlng = new google.maps.LatLng(52.601316, -1.195585);
                    var edgeHill = new google.maps.LatLng(52.1135180, -1.4531970);


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
                                {color: "#000000"},
                                {lightness: 5}
                            ]
                        },
                        {
                            featureType: 'landscape',
                            elementType: 'all',
                            stylers: [
                                {color: "#08304b"},
                                {lightness: 5}
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
                        title: "Hello World!"
                    });
                    var infowindow = new google.maps.InfoWindow({
                        content: "<h1>IT WORKS</h1>" + "I managed to get the infowindow working"
                    });

                    google.maps.event.addListener(markerEdgeHill, 'click', function() {
                        infowindow.open(map, markerEdgeHill);
                        map.setZoom(10);
                        map.setCenter(markerEdgeHill.getPosition());

                    });
                }

                google.maps.event.addDomListener(window, 'load', initialize);


            </script>
    </head>
    
    <body>
        <!-- wrapper class  -->
        <div class="wrapper" >
           
            <div class="header">THIS IS THE HEADER</div>
            <div class="nav_bar">THIS IS THE NAV BAR</div>     
            <div class="battleList">THIS IS THE LIST OF BATTLES</div>
          
            <div id ="map-canvas" class="api">     </div>
            <div class="footer">This is the footer</div>
        </div>
    </body>
    
</html>