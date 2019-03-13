<?php
echo "<script>var dates = [];";

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

foreach ($users as $user) {
    $php_array = json_decode(file_get_contents("http://api.open-notify.org/iss-pass.json?lat=".$user->latitude."&lon=".$user->longitude))->response;
    foreach ($php_array as $date) {
        $date->latitude = $user->latitude;
        $date->longitude = $user->longitude;
        $date->name = $user->name;
    }
    echo "dates.push(".json_encode($php_array).");";
}
echo "</script>";
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
		<title>Carte</title>
        <script src="js/dates.js"></script>
	</head>
	<body>
        <h1 id="title"></h1>
        <div id="map"></div>
        <a href="index.php">Index</a>
	</body>
</html>