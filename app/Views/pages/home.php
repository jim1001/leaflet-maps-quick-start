<!-- Ref: https://leafletjs.com/examples/quick-start/ -->
<!-- Access token for mapbox - see my keepass for mapbox signon




<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>

<!-- This picks up .js from <app-home>/assets/... 
where assets/ folder is at same level as app/ folder -->
<script src="<?php echo base_url('assets/LeafletSvgShapeMarkers/dist/leaflet-svg-shape-markers.min.js'); ?>"></script>


<div id="mapid"> </div>
<script>
/* Initialize the map and set its view to our chosen geographical coordinates and a zoom level */
var mymap = L.map('mapid').setView([51.505, -0.09], 13);

/*  Set the URL template for the tile images, the attribution text and the maximum zoom level of the layer */
L.tileLayer(
    'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiamltMTAwMSIsImEiOiJja2IzdnY1NWEwOXdyMnpuc3o3aHBsNjh0In0.43ZJDfNGv3i360UR4WDd0g', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);

/* Add a marker */
var marker1 = L.marker([51.5, -0.09]);

/* Add popups to objects added above */
marker1.bindPopup("<b>Sample key: </b>BG-008<br><b>Selected phrase: </b>none");
var myLayerGroup = L.layerGroup([marker1]);

/* Add a marker */
var marker2 = L.marker([51.52, -0.092]);

/* Add popups to objects added above */
marker2.bindPopup("<b>Sample key: </b>AB-100<br><b>Selected phrase: </b>none");
myLayerGroup.addLayer(marker2);

myLayerGroup.addTo(mymap);

var phrases = ["rom1", "rom2"];

/* Add marker using leaflet-svg-shape-markers library */
/* https://github.com/rowanwins/Leaflet.SvgShapeMarkers */
var square = L.shapeMarker([51.505, -0.093], {
    shape: "square",
    color: "red",
    fillOpacity: 1,
    radius: 10
}).addTo(mymap)

/* Add marker using shape, color arrays */
var colors = ["green", "yellow"];
var shapes = ["triangle", "diamond"];

L.shapeMarker([51.505, -0.094], {
    shape: shapes[0],
    color: colors[0],
    fillOpacity: 1,
    radius: 10
}).addTo(mymap)
</script>

<div>
    <p><button onclick="changePopUp(myLayerGroup, phrases)">Change popup</button></p>
</div>

<script>
function changePopUp(layerGroup_in, phrases_in) {
    var popup;
    var content;
    var newContent
    //alert(phrases_in);
    var markers = layerGroup_in.getLayers();
    for (var i = 0; i < markers.length; i++) {
        popup = markers[i].getPopup();
        content = popup.getContent();
        //Replace text "Selected phrase" to end of line with "Selected phrase..." + new phrase
        newContent = content.replace(/Selected phrase.*$/, "Selected phrase: </b>" + phrases_in[i])
        popup.setContent(newContent);
    }
}
</script>