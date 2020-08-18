@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
		<h3 align="center">Peta Penyebaran Covid-19</h3>
        <div id="map"></div>
		
		<script>
		/* Initial Map */
		var map = L.map('map').setView([-2.4058653,117.5021489],5);
		var _attribution = '<a href="https://imtiyaz.web.id" target="_blank">Agus Sumarna@2020</a>';
		
		/* Tile Basemap */
		var basemaps = [
			L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=tPD19hyOMRmee7iSboNL', {
				attribution: 'Maptiler | ' + _attribution
			})
		];

		/* GeoJSON Layer */
		var kasus = L.geoJson(null, {
			pointToLayer: function (feature, latlng){
				if (feature.properties) {
					var redMarker = L.ExtraMarkers.icon({
						icon: 'fa-number',
						number: feature.properties.Kasus_Posi,
						markerColor: 'red',
						shape: 'square',
						prefix: 'fa',
						tooltipAnchor: [15, -25]
					});
					return L.marker(latlng, {
						icon: redMarker,
						riseOnHover: true
				  });
				}
			},
			onEachFeature: function (feature, layer){
				if (feature.properties) {
					var content = "<div class='card'>" +
					"<div class='card-header alert-danger text-center p-1'><strong>Provinsi<br>" + feature.properties.Provinsi + "</strong></div>" +
					"<div class='card-body p-0'>" +
					"<table class='table table-responsive-sm m-0'>" +
						"<tr><th><i class='far fa-sad-tear'></i> Kasus Positif</th><th>" + feature.properties.Kasus_Posi + "</th></tr>" +
						"<tr class='text-success'><th><i class='far fa-smile'></i> Kasus Sembuh</th><th>" + feature.properties.Kasus_Semb + "</th></tr>" +
						"<tr class='text-danger'><th><i class='far fa-frown'></i> Kasus Meninggal</th><th>" + feature.properties.Kasus_Meni + "</th></tr>" +
					"</table>" +
					"</div>";
					layer.on({
						click: function (e) {
							kasus.bindPopup(content);
						},
						mouseover: function (e) {
							kasus.bindTooltip("Prov. " + feature.properties.Provinsi);
						}
					});
				}
			},
			filter: function(feature, layer){
				return (feature.properties.Kasus_Posi > 50);
			}
		});

		$.getJSON("https://opendata.arcgis.com/datasets/0c0f4558f1e548b68a1c82112744bad3_0.geojson", function (data) {
			kasus.addData(data);
			var groupLayer = L.featureGroup([kasus]);
			groupLayer.addTo(map);
			map.fitBounds(groupLayer.getBounds());
		});

		/* Control Basemaps */
		map.addControl(
			L.control.basemaps({
				basemaps: basemaps,
				tileX: 0,
				tileY: 0,
				tileZ: 1
			})
		);
		</script>
	  
		<script>
			/*
			//configuraion
			var mapStyle1 = 'basic';
			var mapStyle2 = 'hybrid';
			var mapStyle3 = 'bright';
			var mapStyle4 = 'outdoor';
			var mapStyle5 = 'streets';
			
			var mapRaster1 = 'jpg';
			var mapRaster2 = 'png';
			
			var mapOptions = {
				center: [-2.4058653,117.5021489],
				zoom: 5
			}
			
			//main code
			var map = L.map('map', mapOptions);
			
			L.tileLayer('https://api.maptiler.com/maps/'+mapStyle5+'/{z}/{x}/{y}.'+mapRaster2+'?key=tPD19hyOMRmee7iSboNL',{
				tileSize: 512,
				zoomOffset: -1,
				maxZoom: 18,
				minZoom: 1,
				attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
				crossOrigin: true
			}).addTo(map);
			*/
		</script>
    </div>
</div>

<br>
<div class="container">
    <div class="col-md-12">

        <table class="table table-striped border">
        <thead>
            <tr>
            <th>Positif</th>
            <th>Sembuh</th>
            <th>Meninggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$result['0']['positif']}}</td>
                <td>{{$result['0']['sembuh']}}</td>
                <td>{{$result['0']['meninggal']}}</td>
            </tr>
        </tbody>
        </table><i>
		Sumber Data :
		<a href="https://opendata.arcgis.com/datasets/0c0f4558f1e548b68a1c82112744bad3_0.geojson" target="_blank">
		https://opendata.arcgis.com/datasets/0c0f4558f1e548b68a1c82112744bad3_0.geojson
		</a></i>
    </div>
</div>
@endsection