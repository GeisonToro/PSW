<?php
include 'consultica.php';
//echo$json;
//die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>  <!-- plugin jquery -->
	<link rel="stylesheet" href="https://npmcdn.com/leaflet@1.0.0-rc.1/dist/leaflet.css" />
	<script src="https://npmcdn.com/leaflet@1.0.0-rc.1/dist/leaflet.js"></script>
	<link rel="stylesheet" type="text/css" href="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js"></script>
	
	
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet"/>
	<script src="https://kit.fontawesome.com/02eb88b373.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.css" />
	
	<link rel="stylesheet" href="https://leaflet.github.io/Leaflet.draw/src/leaflet.draw.css"/>
	
	<script src="graticule/Leaflet.Graticule.js"></script>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" ></script>
 
	<link rel="stylesheet" href="geocodificar/l.geosearch.css" />	
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.css" integrity="sha384-P9DABSdtEY/XDbEInD3q+PlL+BjqPCXGcF8EkhtKSfSTr/dS5PBKa9+/PMkW2xsY" crossorigin="anonymous">  
<script src="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.js" integrity="sha384-N2S8y7hRzXUPiepaSiUvBH1ZZ7Tc/ZfchhbPdvOE5v3aBBCIepq9l+dBJPFdo1ZJ" crossorigin="anonymous"></script>
	
	
	<link rel="stylesheet" href="betterscale/L.Control.BetterScale.css" />
	<script src="betterscale/L.Control.BetterScale.js"></script>
	
	
    
	
	<script src="js/leaflet-heat.js"></script>
	<title>VISOR BUITRERA TRAVEL</title>
	
	
	
   
	
	
	<style>
	*{	
		padding: 0% ;
		margin: 0% 0%;		
	}
	html, body{
	height:100% ;
	width:100% vw;
	}
	
	
	#map{

	width:100%;
	height:100%;}.leaflet-popup-content {
            padding: 1px;    
            background:#f1b10e;
            
                    }
    .leaflet-popup-content-wrapper{
            background:#ebcb7a;
                
        }
    .leaflet-popup-tip {
            background:red;
        }
    .imgpop{
       width: 150px;
        }

	#norte{
	position:fixed;
	width:2%;
	left: 3%;
	padding: 1.2%;
	}
	
	
	
	
	
	
	#datos{
	position:relative;
	float:right;
	width:30%;
	height:50%;
	background-color:green;
	top:-90%;
	border-radius:38px;
	outline: 3px solid IndianRed;
	outline-offset: 10px;
	right:5%;}
	
	
	#datos1{
	position:relative;
	float:right;
	width:30%;
	height:20%;
	background-color:green;
	top:-25%;
	border-radius:10px;
	outline: 3px solid IndianRed;
	outline-offset: 10px;
	right:-25%;}
	
	
	#graficar{
	background-color:FireBrick;
	border-color:FireBrick;
	color:white;
	border-radius:5px;
	}
	</style>
	
	
	
	</head>	
	<body>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


			<div id="map" style="z-index:0">
				<img id="norte" src="images/norte.png" style="z-index:9999" ></img>
				<input id="seleccionar_color" type="color" style="z-index:9999">
			</div>
<script src="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.js"></script>


<script src="geocodificar/l.control.geosearch.js"></script>
<script src="geocodificar/l.geosearch.provider.esri.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.2/leaflet.draw.js"></script>
	

		
	
</body>




	<script>

	
	var map = L.map('map',
	{
		zoom: 17
	}).setView([3.42335,-76.52086], 13);           ////SE INSERTA UN MAPA EN EL DIV "map" con coordenadas 3.42335,-76.52086
	
	
	var mapabase = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 
		{
			maxZoom: 19,
			attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
		});
	
	var mapabase2 = L.tileLayer(' http://a.tile.stamen.com/terrain/{z}/{x}/{y}.png', 
		{
			maxZoom: 19,
			attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
		})
	

	mapabase.addTo(map);
	
	L.control.scale({position:'bottomleft'}).addTo(map);
	var leyenda = L.control.layers({mapabase,mapabase2}).addTo(map);

	var icono = L.icon({
			iconSize: [35, 35],
			iconUrl:'images/robo.jpg'
			});
		

		
	var geojsonFeature = [{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.55844778406635,3.364423386516834]},
	"properties": {
	"name": "Km 3 Via la Buitrera",
     "title": "Km 3 Via la Buitrera",
	"imagen": "comida.jpeg",}}
	, {
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.56838268610322,3.3800603638316664]}, 
	"properties": {
	"name": "Asadero de pollo Jireh",
     "title": "Asadero de pollo Jireh",
	"imagen": "comida.jpeg",}}
	, {
    "type": "Feature",
    "geometry": {
        "type": "Point",
        "coordinates": [ -76.5701901918198,3.3827916648920793]}, 
	"properties": {
	"name": "Almuerzos doña gloria",
     "title": "Almuerzos doña gloria",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.57161855769357,3.382738286032148]},
	"properties": {
	"name": "Callejon macondo",
     "title": "Callejon macondo",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.5784969570006,3.3833117385454137]}, 
	"properties": {
	"name": "El crucero la Buitrera",
     "title": "El crucero la Buitrera",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.59490275106612,3.3734981729128997]}, 
	"properties": {
	"name": "Los Gongos cds",
     "title": "Los Gongos cds",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.60788947556618,3.3684687774338]}, 
	"properties": {
	"name": "Villa Maria",
     "title": "Villa Maria",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.56294283207563,3.370243026626167]}, 
	"properties": {
	"name": "Rico arroz",
     "title": "Rico arroz",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.5656679565658,3.3887073746540692]}, 
	"properties": {
	"name": "Dolcebanana19821",
     "title": "Dolcebanana19821",
	"imagen": "comida.jpeg",}}
	
	
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.58948287716528,3.3808072982543176]}, 
	"properties": {
	"name": "Finca el Diviso",
     "title": "Finca el Diviso",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.56275945801787,3.3649502743201953]}, 
	"properties": {
	"name": "Asado llanero",
     "title": "Asado llanero",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.55885952621774,3.36418448480256]}, 
	"properties": {
	"name": "Restaurante trifasico fast food",
     "title": "Restaurante trifasico fast food",
	"imagen": "comida.jpeg",}}
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.55868250040383,3.3647896192238953]}, 
	"properties": {
	"name": "Pizza don Julio",
     "title": "Pizza don Julio",
	"imagen": "comida.jpeg",}}
	
	,{
    "type": "Feature",
	"geometry": {
        "type": "Point",
        "coordinates": [ -76.55865031383361,3.364537926205177]},
	"properties": {
	"name": "Del Carajo Cali",
     "title": "Del Carajo Cali",
	"imagen": "comida.jpeg",}}
	
	];
	
	
	
		
	var featuresLayer = L.geoJSON(geojsonFeature , {
			pointToLayer: function (feature, latlng) {
				return L.marker(latlng, {icon: icono}).bindPopup("<ul><h3>" +feature.properties.name+" </h3><figure><img class='imgpop' src="+feature.properties.imagen+"></figure></ul>");
		}});

//L.control.bigImage({position:'topright'}).addTo(map);

var jsonPHP=JSON.parse('<?php echo $json;?>');
console.log(jsonPHP);
for(i=0; i<jsonPHP.length; i++){
	var marcadorPHP= L.marker([jsonPHP[i][15],jsonPHP[i][16]]).addTo(map);
	console.log(marcadorPHP);
	marcadorPHP.bindPopup('<h2> Reporte N°: ' + jsonPHP[i][0] + '</h2><br>' + '<h2> Fecha: ' + jsonPHP[i][8] + '</h2><br>' + '<h2> Tipo de Hurto: ' + jsonPHP[i][9] + '</h2><br>' + '<h2> Modalidad: ' + jsonPHP[i][10] + '</h2><br>' + '<h2> Descripcion: ' + jsonPHP[i][11] + '</h2><br>' );
}

var popup = L.popup();

var login = '<p align="center"><a id="visor" href="Login.html"><input type ="button" value= "Login">';
var registro = '<p align="center"><a id="visor" href="Registro.html"><input type ="button" value= "Registrarse">';


function onMapClick(e) {
	popup
		.setLatLng(e.latlng)
		.setContent("<center>para generar un registro primero debes registrarte y luego logiarte : </center>" + "</br>"+ login + "</br>"+ registro)
		.openOn(map);
		
}

map.on('click', onMapClick);

L.easyButton('<img src="images/reset.png"  align="absmiddle" height="16px" >', function() 
		{
		alert('reiniciando pagina');
		location.reload();

	  	},'Reiniciar pagina').addTo(map);
		


lc = L.control.locate({locateOptions: {
               enableHighAccuracy: true },
    position: 'topleft',
    strings: {
        title: "ubicacion GPS"
    }
}).addTo(map);


L.control.scalefactor().addTo(map);

new L.Control.GeoSearch({provider: new L.GeoSearch.Provider.Esri()}).addTo(map);





var drawnItems = new L.FeatureGroup();
	
			var drawControl = new L.Control.Draw({
				position: 'topright',
				
				edit: {
					featureGroup: drawnItems,
					remove: true,
					edit: 	true,
					showArea: true,
					repeatMode: false,
					metric: true
				},
				draw: {
					circlemarker: true,
					circle:{
					shapeOptions: {
						color: 'red',
					},
				},
				polyline: {
					shapeOptions: {
						color: 'red'
					},
				},
					rectangle:{
					shapeOptions: {
						color: 'red'
					},
				},
					marker: {
					icon: icono
				},
				}
			});
			map.addControl(drawControl);
			
			map.on(L.Draw.Event.CREATED, function (e) {
			    var type = e.layerType,
			        layer = e.layer;

			    if (type === 'marker') {
			        layer.bindPopup('Aquí un hurto!');
			    }

			    drawnItems.addLayer(layer);
				map.addLayer(drawnItems);
			});
			

L.latlngGraticule({
			showLabel: true,
			opacity:0.7,
			color: 'black',
			precision:1,
			zoomInterval: [
				{start: 14, end: 14, interval: 0.02}

			]}).addTo(map);
	

var options = {
          position: 'topright',         // Leaflet control position option
      circleMarker: {               // Leaflet circle marker options for points used in this plugin
        color: 'red',
        radius: 2
      },
      lineStyle: {                  // Leaflet polyline options for lines used in this plugin
        color: 'red',
        dashArray: '1,6'
      },
      lengthUnit: {                 // You can use custom length units. Default unit is kilometers.
        display: 'km',              // This is the display value will be shown on the screen. Example: 'meters'
        decimal: 2,                 // Distance result will be fixed to this value. 
        factor: null,               // This value will be used to convert from kilometers. Example: 1000 (from kilometers to meters)  
        label: 'Distance:'           
      },
      angleUnit: {
        display: '&deg;',           // This is the display value will be shown on the screen. Example: 'Gradian'
        decimal: 2,                 // Bearing result will be fixed to this value.
        factor: null,                // This option is required to customize angle unit. Specify solid angle value for angle unit. Example: 400 (for gradian).
        label: 'Bearing:',
		
      },
	  
    }
L.control.ruler(options).addTo(map);	
	

L.control.betterscale({metric:true,imperial:false,maxWidth:100}).addTo(map);		
		
	var comunas = L.tileLayer.wms('http://ws-idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0',
		{
		layers: 'idesc:mc_comunas',
		format: 'image/png',
		transparent: true,
		});
		map.addLayer(comunas);
		
		
		var barrios = L.tileLayer.wms('http://ws-idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0',
		{
		layers: 'idesc:mc_barrios',
		format: 'image/png',
		transparent: true,
		});
		map.addLayer(barrios);
		

	leyenda.addOverlay(comunas, 'Comunas');
	leyenda.addOverlay(barrios, 'Barrios');

	</script>
	
</html> 