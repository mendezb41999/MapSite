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
        <h1>My Google Map</h1>


        <div id="map"></div>
           <?php                   
               require 'config.php';
               $query= "SELECT title,lat,lng,`data` FROM a_all_items";
               $items= mysqli_query($link, $query);
            ?>
             
            <?php   

            class Location {
                public $title;
                public $lat;
                public $lng;

                function __construct(String $title, String $lat, String $lng) {
                    $this->title = $title;
                    $this->lat = $lat;
                    $this->lng = $lng;
                }
            }

            $r_vals=[];   
            $data_vals=[];
            while($vals=mysqli_fetch_object($items)){
                array_push($data_vals, $vals->data);
                array_push($r_vals, new Location($vals->title, $vals->lat,$vals->lng));
            }
                ?>


        <script>
            function initMap(){
                //map options
                var options = {
                    zoom:13,
                    center:{lat:41.7476,lng:-74.0868}

                }
                //New Map Created
                var map = new google.maps.Map(document.getElementById('map'), options);

                //Listen for click on map
                

                /*
                //Add Marker
                var marker = new google.maps.Marker({
                    position:{lat:41.7522,lng:-74.0881},
                    map:map
                 });



                 var infoWindow = new google.maps.infoWindow({
                    content:'<h1>Test Info Window</h1>'

                 });

                 marker.addListener('click', function(){
                    infoWindow.open(map, marker);
                 });
                 
            
                */

                 //Array Of Markers

                 var temp = <?php  echo json_encode($r_vals); ?>;
                 var temp2 = [
                    <?php 
                        foreach ($data_vals as $data) {
                            // Curse php and its horrible implementation of every technology
                            echo $data;
                       ?>   
                    ,
                            
                       <?php   
                        }
                    ?>
                 ];
                 console.table(temp);
                 console.table(temp2);
                 console.log("Marker: 1")

                 var marker=[];
                temp.forEach((c, i)=>{
                    marker.push({
                        coords:{
                            lat:Number(c.lat),lng:Number(c.lng)
                        },
                        title: c.title,
                        data: temp2[i],
                    })
                })

                    console.log(marker);
                    console.log("Marker: 2")

                 var markers = [
                 {
                    coords:{lat:41.7522,lng:-74.0881},
                    iconImage:'https://developers.google.com/maps/documentation/javascript/examples/full/images/info-i_maps.png',
                    content:'<h1>Test Info One</h1>'
                
                },
                     {coords:{lat:41.7157,lng:-74.11121}},
                     
                     


                 ];
                const mapInfoToMarker = (title="test", data="test", coords) => {
                    const infoWindow = new google.maps.InfoWindow({
                        content: `<h2>${title}</h2><hr />Historic Function: ${data["Historic Function"]}`
                        
                    })

                    let testMarker = new google.maps.Marker({
                        position: coords,
                        map
                    })

                    testMarker.addListener("click", () => {
                        infoWindow.open({
                            anchor: testMarker,
                            map
                        })
                    })
                }

                    //loop through markers
                    // for(let i = 0; i < marker.length; i++){
                    //     if (marker[i].coords.lat != 0 && marker[i].coords.lng != 0) {
                    //         mapInfoToMarker(marker[i].title, marker[i].data, marker[i].coords);
                    //     }

                    // }
                    var thisLat = 41.7641292196139
                    var thisLng = -74.0584527740459
                    marker.forEach((mark) => {
                        if (mark.coords.lat == thisLat && mark.coords.lng == thisLng) {
                            mapInfoToMarker(mark.title, mark.data, mark.coords);
                        }
                    })                 
                                                                        
                    const contentString = 
                    '<div id="content">' +
                     '<div id="siteNotice">' +
                     "</div>" +
                     '<h1 id="firstHeading" class="firstHeading">Testing</h1>' +
                      '<div id="bodyContent">' +
                     "<p><b>TestContent</b>, also referred to as <b>Ayers Rock</b>, is a large " +
                      "sandstone rock formation in the southern part of the " +
                     "Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) " +
                    "south west of the nearest large town, Alice Springs; 450&#160;km " +
                    "(280&#160;mi) by road. Kata Tjuta and Uluru are the two major " +
                    "features of the Uluru - Kata Tjuta National Park. Uluru is " +
                     "sacred to the Pitjantjatjara and Yankunytjatjara, the " +
                      "Aboriginal people of the area. It has many springs, waterholes, " +
                      "rock caves and ancient paintings. Uluru is listed as a World " +
                      "Heritage Site.</p>" +                     
                      '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">' +
                     "https://en.wikipedia.org/w/index.php?title=Uluru</a> " +
                   "(last visited June 22, 2009).</p>" +
                   "</div>" +
                     "</div>";



                mapInfoToMarker("", contentString, -33.89, 151.274)
                // const infowindow =  new google.maps.InfoWindow({
                //     content: contentString,
                //     ariaLabel:"Testmarker",
  

                // });

                // var Testmarker = new google.maps.Marker({
                //     position:{lat: -33.89, lng: 151.274} ,
                //      map: map,
                
                
                //      });

                //      Testmarker.addListener("click", () => {
                //          infowindow.open({
                //          anchor: Testmarker,
                //              map,
                //             });
                //              });




                //Add Marker Function
                function addMarker(props){
                    var marker = new google.maps.Marker({
                    position:props.coords,
                    map:map,
                    //icon:props.iconImage
                 });
                //check for custom icon
                 if(props.iconImage){
                    //set icon image
                    marker.setIcon(props.iconImage);

                 }

                 //Check Content


                }
                

            }
            </script>

        <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtUZ8-rcfv4hhFXSdPE29liR0_fZloskw&callback=initMap&v=weekly"
      defer
    ></script>
        <script src="" async defer></script>
    </body>
</html>