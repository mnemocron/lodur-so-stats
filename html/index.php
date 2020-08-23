<!DOCTYPE html>
<html>
<title>LODUR | simonmartin.ch</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<style>
html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
.mySlides {display:none}
.w3-tag, .fa {cursor:pointer}
.w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
</style>
<body>

<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-large w3-light-grey">
    <div class="w3-col s3">
      <a href="../" class="w3-button w3-block">simonmartin.ch</a>
    </div>
    <div class="w3-col s3">
      <a href="./map.php" class="w3-button w3-block">Karte</a>
    </div>
    <div class="w3-col s3">
      <a href="https://github.com/mnemocron/lodur-so-stats" class="w3-button w3-block">Code</a>
    </div>
    <!--<div class="w3-col s3">
      <a href="#" class="w3-button w3-block"></a>
    </div>-->
  </div>
</div>

<!-- Content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">

  <div class="w3-panel">
    <h1><b>Feuerwehreinsätze Derendingen (2011 - 2020)</b></h1>
    <p>Die Daten der <a href="https://lodur-so.ch/derendingen/index.php?modul=6">lodur-so.ch</a> Website auf einer Karte dargestellt. Angaben ohne Gewähr (einige Adressen sind fehlerhaft).</p> 
    <p>Kategorien: <span class="w3-red">&nbsp;Feuer&nbsp;</span> / <span class="w3-orange">&nbsp;Alarm (BMA)&nbsp;</span> / <span class="w3-blue">&nbsp;Wasser&nbsp;</span> / <span class="w3-green">&nbsp;Personen / Tiere&nbsp;</span> / <span class="w3-purple">&nbsp;Hazmat (Chemie)&nbsp;</span> / <span class="w3-dark-grey">&nbsp;diverses&nbsp;</span></p>
  </div>

  <div class="w3-panel">
    <iframe src="./map.php" style="width: 100%; height: 50vh;"></iframe>
    <p>Karte öffnen: <a href="./map.php" >Karte</a></p>
  </div>
  
  <!-- Grid -->
  <div class="w3-row w3-container">
    <div class="w3-center w3-padding-64">
      <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Filter</span>
    </div>
    <div class="w3-col l3 m6 w3-light-grey w3-container w3-padding-16 w3-center">
      <h3>Jahre</h3>
      <p>2019 - 2020</p>
      <a href="./map.php?year=2020,2019"><button class="w3-button w3-green w3-padding-large">Karte</button></a>
    </div>

    <div class="w3-col l3 m6 w3-grey w3-container w3-padding-16 w3-center">
      <h3>Kategorie</h3>
      <p>Brandmeldealarm (BMA)</p>
      <a href="./map.php?category=BMA"><button class="w3-button w3-green w3-padding-large">Karte</button></a>
    </div>

    <div class="w3-col l3 m6 w3-dark-grey w3-container w3-padding-16 w3-center">
      <h3>Kategorie</h3>
      <p>Wasser</p>
      <a href="./map.php?category=Water"><button class="w3-button w3-green w3-padding-large">Karte</button></a>
    </div>

    <div class="w3-col l3 m6 w3-black w3-container w3-padding-16 w3-center">
      <h3>Kategorie</h3>
      <p>Chemieunfälle</p>
      <a href="./map.php?category=Hazmat"><button class="w3-button w3-green w3-padding-large">Karte</button></a>
    </div>
  </div>

</div>

<!-- Footer -->

<footer class="w3-container w3-padding-32 w3-light-grey w3-center">
  <h4></h4>
  <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://github.com/mnemocron/lodur-so-stats"><i class="fa fa-github w3-hover-opacity"></i></a>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
