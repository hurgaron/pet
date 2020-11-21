<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Google Maps</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
         <style>
            body {
                font-family: 'Nunito';
            }
            #mapid { 
                height: 400px; 
                }
        </style>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/> 
         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="mapid"></div>
                </div>
            </div>            
        </div>
    </body>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!--script src='https://javascripts/leaflet.markercluster-src.js'></script> -->
    <!--Leaflet (mapa)-->
    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>

    <link rel="stylesheet" href="resources/Leaflet.markercluster/MarkerCluster.css"/>
    <link rel="stylesheet" href="resources/Leaflet.markercluster/MarkerCluster.Default.css"/>    
    <script type="text/javascript" src="resources/Leaflet.markercluster/leaflet.markercluster.js"></script>


    <script type="text/javascript">
        

        const mymap = L.map('mapid').setView([0, 0], 17);
        const attribution ='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';
        const tileUrl = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png';
        const tiles = L.tileLayer(tileUrl, { attribution });
        var osm = new L.TileLayer(tileUrl, {maxZoom: 18, attribution: attribution});
        tiles.addTo(mymap);

        //const marker = L.marker([0, 0]).addTo(mymap);
        axios.get('/api/pets1')
            .then(({ data }) => {

                //alert(data);
                //var pontosMarker = JSON.parse('['+data+']');
                var pontosMarker = data;
                
                //alert(pontosMarker);

                //Markers
                var markers =  L.markerClusterGroup();

                //Setar mapa padrão
                osm.addTo(mymap);

                //Carregar os pontos
                var geoJsonLayer = L.geoJson(pontosMarker, {
                onEachFeature: function (feature, layer) {
                    layer.bindPopup('<b>'+feature.properties.name+'</b><br>'+feature.properties.city);
                }
                });
                markers.addLayer(geoJsonLayer);

                mymap.addLayer(markers);
                mymap.fitBounds(markers.getBounds());
            });
        
    </script>

</html>
