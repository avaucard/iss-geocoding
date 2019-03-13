<?php

$iss_position = json_decode(file_get_contents("http://api.open-notify.org/iss-now.json"))->iss_position;

 $users = array(
    (object) array(
        'name' => 'John',
        'latitude' => '39.2796',
        'longitude' => '-55.3374'
    ),
    (object) array(
        'name' => 'Adele',
        'latitude' => '-24.6293',
        'longitude' => "0.7094"
    ),
    (object) array(
        'name' => 'Hugo',
        'latitude' => '-39.9825',
        'longitude' => '19.5351'
    )
);

echo "<script>var users =".json_encode($users).";var iss_position=".json_encode($iss_position)."</script>";
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        
	    <link rel="icon" href="img/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
            crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
        <script src="js/index.js"></script>
		<title>Carte</title>
	</head>
	<body>
        <h1 id="title"></h1>
        <h2 id="user"></h2>
        <div id="map"></div>
        <a href="dates.php">Dates</a>
	</body>
</html>

<?php
// $page = $_SERVER['PHP_SELF'];
// $sec = "1";
// header("Refresh: $sec; url=$page");
?>