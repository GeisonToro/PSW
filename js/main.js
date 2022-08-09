// var map = L.map('mapa').setView([3.42335,-76.52086], 13);

// var mapaBase = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
// 	maxZoom: 18
// }).addTo(map);
	

// var capaWMS = L.tileLayer.wms('http://ws-idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0', 
// {
// 	layers: 'idesc:mc_comunas',
// 	attribution: 'Creditos de la capa',
// 	format: 'image/png',
// 	transparent: true
// });

// capaWMS.addTo(map);

// var marker = L.marker([3.44420 , -76.47892]).addTo(map)
// 	.bindPopup('<b>Hola Clase</b><br />Yo soy un Marcador !!').openPopup();

// var popup = L.popup();

// function onMapClick(e) {
// 	popup
// 		.setLatLng(e.latlng)
// 		.setContent('Usted acaba de dar click en las coordenadas: ' + e.latlng.toString())
// 		.openOn(map);
// }

// map.on('click', onMapClick);


// var stateChangingButton = L.easyButton({
//     states: [{
//             stateName: 'zoom-to-forest',        // name the state
//             icon: "fa-brands fa-java",               // and define its properties
//             title:     'zoom to a forest',      // like its title
//             onClick: function(btn, map) {       // and its callback
//                 map.setView([3.42335,-76.52086], 12);
//                 btn.state('zoom-to-school');    // change state on click!
//             }
//         }]
// });

// stateChangingButton.addTo( map );

var map = L.map('map').setView([3.42335,-76.52086], 13);

map.removeControl(map.zoomControl);

L.control.zoom({position: "bottomleft"}).addTo(map);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var Rios = L.tileLayer.wms('http://ws-idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0',
		{
		layers: 'pot_2014:bcs_hid_rios',
		format: 'image/png',
		transparent: true,
		});
		map.addLayer(Rios);



var popup = L.popup();

var reporte = '<p align="center"><a id="visor" href="Reporte.php"><input type ="button" value= "Reportar">';

function onMapClick(e) {
	popup
		.setLatLng(e.latlng)
		.setContent("<center>Generar reporte en: </center>" + e.latlng.toString() + "</br>"+ reporte)
		.openOn(map);
}

map.on('click', onMapClick);




var stateChangingButton = L.easyButton({
    states: [{
            stateName: 'zoom-to-forest',        // name the state
            icon: "fa-brands fa-java",               // and define its properties
            title:     'zoom to a forest',      // like its title
            onClick: function(btn, map) {       // and its callback
                map.setView([3.42335,-76.52086], 12);
                btn.state('zoom-to-school');    // change state on click!
            }
        }]
});

stateChangingButton.addTo( map );