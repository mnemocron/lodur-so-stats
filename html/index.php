<!DOCTYPE html>
<html>
<head>
    <title>LODUR | simonmartin.ch</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./assets/leaflet-0.7/leaflet.css" />
</head>
<body>
    <div id="map" style="width: 98vw; height: 98vh; padding: 0px; margin: 0px;"></div>

    <script src="./assets/leaflet-0.7/leaflet.js">
    </script>

    <script>
        var map = L.map('map').setView([47.190749, 7.589192], 14);
        mapLink = 
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
            }).addTo(map);

        var greenIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-green.png',
          shadowUrl: './assets/icons/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });
        var redIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-red.png',
          shadowUrl: './assets/icons/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });
        var blueIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-blue.png',
          shadowUrl: './assets/icons/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });
        var goldIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-gold.png',
          shadowUrl: './assets/icons/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });
        var orangeIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-orange.png',
          shadowUrl: './assets/icons/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });
        var yellowIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-yellow.png',
          shadowUrl: './assets/icons/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });
        var violetIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-violet.png',
          shadowUrl: './assets/icons/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });
        var greyIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-grey.png',
          shadowUrl: './assets/icons/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });
        var blackIcon = new L.Icon({
          iconUrl: './assets/icons/marker-icon-2x-black.png',
          shadowUrl: './assets/icons/images/marker-shadow.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
        });

        <?php
        $year = $_GET["year"];
        $category = $_GET["category"];

        $filepath = "lodur-raw.json";
        $myfile = fopen($filepath, "r") or die("Unable to open file!");
        $jsonstr = fread($myfile, filesize($filepath));
        $jsondata = json_decode($jsonstr, true);
        fclose($myfile);

        $i = 0;
        foreach ($jsondata as $position) {
            // randomize location so that multiple at the same address are scattered around
            $blur = (rand(0,1000) / 1000) / 10000 * 3;
            $lat = $position["lat"] + $blur;

            $blur = (rand(0,1000) / 1000) / 10000 * 3;
            $lon = $position["lon"] + $blur;

            $cat = $position["category"];
            $txt = $position["text"];
            $adr = $position["address"];
            $dat = $position["date"];

            $icon = "greyIcon";
            if(strpos($cat, "BMA") !== false){
                $icon = "orangeIcon";
            } else if(strpos($cat, "Water") !== false){
                $icon = "blueIcon";
            } else if(strpos($cat, "Fire") !== false){
                $icon = "redIcon";
            } else if(strpos($cat, "Hazmat") !== false){
                $icon = "violetIcon";
            } else if(strpos($cat, "Animal") !== false || strpos($cat, "Person") !== false){
                $icon = "greenIcon";
            }

            // correctly escape Anführungszeichen
            $popup = "\"<b>" . str_replace("\"", "\\\"", $txt) . "</b><p>" . $dat . " - " . str_replace("\"", "\\\"", $cat) . " - " . str_replace("\"", "\\\"", $adr) . "</p>\"";
            if(array_key_exists("lat", $position) && array_key_exists("lon", $position)){
                echo("var marker_" . $i . " = L.marker([" . $lat . ", " . $lon . "], {icon: " . $icon . "},{draggable: false,title: '" . $cat . "',opacity: 1.0}).addTo(map).bindPopup(" . $popup . ");\n");
                $i = $i +1;
            }
        }

        ?>

    </script>
</body>
</html>