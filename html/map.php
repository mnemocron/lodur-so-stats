<!DOCTYPE html>
<html>
<head>
    <title>LODUR | simonmartin.ch</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./assets/leaflet-0.7/leaflet.css" />

    <!-- https://www.favicon-generator.org/ -->
    <link rel="apple-touch-icon" sizes="57x57" href="../images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
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
        $filt_years = preg_replace("/[^0-9]+/", "", explode(",", $_GET["year"]));
        $filt_cat = preg_replace("/[^a-zA-Z0-9]+/", "", explode(",", $_GET["category"]));

        $len_filt_years = count($filt_years);
        $len_filt_cat = count($filt_cat);

        if(!isset($_GET["year"])){
          $len_filt_years = 0;
        }
        if(!isset($_GET["category"])){
          $len_filt_cat = 0;
        }
        ?>


        <?php
        $filepath = "lodur-raw.json";
        $myfile = fopen($filepath, "r") or die("Unable to open file!");
        $jsonstr = fread($myfile, filesize($filepath));
        $jsondata = json_decode($jsonstr, true);
        fclose($myfile);

        $i = 0;
        foreach ($jsondata as $position) {
            // randomize location so that multiple at the same address are scattered around
            $blur = (rand(-1000,1000) / 1000) / 10000 * 2;
            $lat = $position["lat"] + $blur;

            $blur = (rand(-1000,1000) / 1000) / 10000 * 2;
            $lon = $position["lon"] + $blur;

            $cat = trim( explode("/", $position["category"])[0] );
            $txt = $position["text"];
            $adr = $position["address"];
            $dat = $position["date"];
            $year = preg_replace("/[^0-9]+/", "", explode("-", $dat)[0]);

            $post_marker = 1;  // false
            if($len_filt_years > 0){
              if(!in_array($year, $filt_years)){
                $post_marker = 0;
              }
            } 

            if($len_filt_cat > 0){
              if(!in_array($cat, $filt_cat)){
                $post_marker = 0;
              }
            }

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

            if($post_marker){
              // correctly escape Anführungszeichen
              $popup = "\"<b>" . str_replace("\"", "\\\"", $txt) . "</b><p>" . $dat . " - " . str_replace("\"", "\\\"", $cat) . " - " . str_replace("\"", "\\\"", $adr) . "</p>\"";
              if(array_key_exists("lat", $position) && array_key_exists("lon", $position)){
                  echo("var marker_" . $i . " = L.marker([" . $lat . ", " . $lon . "], {icon: " . $icon . "},{draggable: false,title: '" . $cat . "',opacity: 1.0}).addTo(map).bindPopup(" . $popup . ");\n");
                  $i = $i +1;
              }
            }
            
        }

        ?>

    </script>
</body>
</html>