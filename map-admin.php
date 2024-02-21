<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My Google Map</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
            #map{
                height:1200px;
                width:100%;
            }

        </style>
    </head>
    <body>

        <div id="map"></div>

        <script>
            function initMap(){
                //map options
                var options = {
                    zoom:13,
                    center:{lat:41.7476,lng:-74.0868},
				styles: [
					{
						featureType: "poi.business",
						stylers: [{ visibility: "off"}]
					},
					{
						featureType: "transit",
		  				elementType: "labels.icon",
						stylers: [{ visibility: "off" }],
					}
				]


                }
                //New Map Created
                var map = new google.maps.Map(document.getElementById('map'), options);

                const hrefFix_to = (lat, lng) => ("create-item.php?lat=" + lat + "&lng=" + lng);
                

                const MyLatLng = { lat: 41.7157, lng:-74.11121 };
                let infoWindow = new google.maps.InfoWindow({
                   content: "Click the map to get Lat/Lng!",
                   position: MyLatLng, 
                });

                infoWindow.open(map);
                // Configure the click listener.
                map.addListener("click", (mapsMouseEvent) => {
                    // Close the current InfoWindow.
                    infoWindow.close();
                    // Create a new InfoWindow.
                    infoWindow = new google.maps.InfoWindow({
                        position: mapsMouseEvent.latLng,
                    });

                    const latLng = mapsMouseEvent.latLng.toJSON();

                    infoWindow.setContent(
                        `
                        <a 
                            href=${hrefFix_to(latLng.lat, latLng.lng)}>
                            Click to add.
                        </a>
                        `
                    );
                    infoWindow.open(map);
                });
            }            
            </script>

        <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtUZ8-rcfv4hhFXSdPE29liR0_fZloskw&callback=initMap&v=weekly"
      defer
    ></script>
        <script src="" async defer></script>
    </body>
</html>