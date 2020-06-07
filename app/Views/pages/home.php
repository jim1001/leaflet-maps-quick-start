<!-- Ref: https://leafletjs.com/examples/quick-start/ -->
<!-- Access token for mapbox - see my keepass for mapbox signon




<!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

 <div id="mapid"> </div>
 <script>
 /* Initialize the map and set its view to our chosen geographical coordinates and a zoom level */
 var mymap = L.map('mapid').setView([51.505, -0.09], 13);
 
 /*  Set the URL template for the tile images, the attribution text and the maximum zoom level of the layer */
 L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiamltMTAwMSIsImEiOiJja2IzdnY1NWEwOXdyMnpuc3o3aHBsNjh0In0.43ZJDfNGv3i360UR4WDd0g', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'your.mapbox.access.token'
}).addTo(mymap);

/* Add a marker */
var marker = L.marker([51.5, -0.09]).addTo(mymap);

/* Add a circle */
var circle = L.circle([51.508, -0.11], {
    color: 'orange',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
}).addTo(mymap);

/* Add a polygon */
var polygon = L.polygon([
    [51.509, -0.08],
    [51.503, -0.06],
    [51.51, -0.047],
	],
	{ color: 'red'
	}).addTo(mymap);
	
/* Add popups to objects added above */
marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
circle.bindPopup("I am a circle.");
polygon.bindPopup("I am a polygon.");

/* Use popup as layer */
var popup = L.popup()
    .setLatLng([51.5, -0.09])
    .setContent("I am a standalone popup.")
    .openOn(mymap);
	
/* Add an alert event */
function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}

mymap.on('click', onMapClick);	

/* Add a popup event (appears to negate alert event above) */
var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
}

mymap.on('click', onMapClick);



 </script>




 

 