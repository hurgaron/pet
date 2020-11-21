@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Map')])
        <!-- Styles -->
        <style>
          body {
              font-family: 'Nunito';
          }
          #mapid { 
              height: 100%; 
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
@section('content')

<div id="map">
<div id="mapid"></div>
</div>
@endsection

@push('js')

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
  //const TileUrl='http://mt{n4}.google.com/vt/lyrs=m@157000000&hl=en&x={x}&y={y}&z={z}.png';
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
              layer.bindPopup('<b>'+feature.properties.name+
                                '</b><br>'+feature.properties.city+
                                '<br>'+feature.properties.hours
                                );
          }
          });
          markers.addLayer(geoJsonLayer);

          mymap.addLayer(markers);
          mymap.fitBounds(markers.getBounds());
      });
  
</script>
@endpush