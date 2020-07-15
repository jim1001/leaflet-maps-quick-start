<!doctype html>
<html>

<head>
    <title>Leaflet Quick Start Guide</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <style>
    <!-- Give any element tagged "mapid" a defined height 
    -->
    #mapid
    {
    height:
    500px;
    }
    </style>
</head>

<body>

    <h1><?=esc($title);?></h1>