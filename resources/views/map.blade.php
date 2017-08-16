@extends('layouts.app')
@section('content')
<!-- BEGIN PAGE CONTENT -->

<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>

		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="{{url('leaflet')}}/Leaflet.gridCluster.css"/>


<script src="{{url('leaflet')}}/Leaflet.gridCluster.js"></script>
<style>
			#controls {
				position: absolute;
				z-index: 100000;
				bottom: 1em;
				left: 1em;
				background-color: rgba(60,60,60,0.8);
				padding: 1em;
				color: white;
			}

		</style>
<div class="page-content page-builder">
    <div id="hidden-small-screen-message">
        <h2 class="m-t-40"><strong>Map</strong>Viewer</h2>
    </div>

    <div id="page-content">
        
        <div id="map" style="width: 100%;">
            
        </div>
        <div style="clear: both;height: 100px;"></div>
    </div>

</div>
<script>
			var map = L.map('map', { });
		
			L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);

			var gridCluster = L.gridCluster({
				gridSize : 0.035,
                                gridMode: 'square',
				showGrid : true,
				showCentroids : true,
				symbolizationVariable : 'valuesize',
				weightedCentroids : true,
				minFeaturesToCluster : 1,
				showCells : true,
				maxZoom : 16,
				cellStyle : {
					color : 'red',
					opacity : 0.2,
					fillOpacity : 0.43
				},
				colors : ['rgb(252,146,114)', 'rgb(251,106,74)', 'rgb(239,59,44)', 'rgb(203,24,29)', 'rgb(153,0,13)'] //reds
				
			}).addTo(map);

			map.setView([48.85929, 2.34215], 12);
			
			

			var bikestations = $.getJSON("{{url('leaflet')}}/bikes-paris.json", function(data) {

				$.each(data.network.stations, function(i, v) {

					var station = L.circleMarker([v.latitude, v.longitude], {
						fillColor : v.free_bikes > 0 ? "green" : "red",
						stroke : true,
						color : 'black',
						fillOpacity : 0.2

					}).setRadius(3);
					station.bindPopup("<h3>" + v.name + "</h3>Free Bikes: " + v.free_bikes);
					
					gridCluster.addLayer(station);

				});

				gridCluster._cluster();

			});

			$("#increase").click(function() {
				gridCluster.increaseGridSize();
				$("#currentGridSize").text(gridCluster._currentGridSize);
			});

			$("#decrease").click(function() {
				gridCluster.decreaseGridSize();
				$("#currentGridSize").text(gridCluster._currentGridSize);
			});
			$("#showGrid").click(function() {
				gridCluster.toggleOption("grid");
			});
			$("#showCells").click(function() {
				gridCluster.toggleOption("cells");
                                        });
                                        $("#showCentroids").click(function() {
                                                gridCluster.toggleOption("centroids");
                                        });
                                        $("#labelPosition").click(function() {
                                                gridCluster.toggleOption("labelPos");
                                        });
                                        $("#symbolization").change(function() {
                                                var value = this.value;
                                                gridCluster.toggleOption("symbolization", value);
                                        });

</script>
<!-- END PAGE CONTENT -->
@endsection