<?php
echo "<script>var dates = [];";

$users = array(
    (object) [
        'name' => 'John',
        'latitude' => '39.2796',
        'longitude:' => '-55.3374'
    ],
    (object) [
        'name' => 'Adele',
        'latitude' => '-24.6293',
        'longitude:' => "0.7094"
    ],
    (object) [
        'name' => 'Hugo',
        'latitude' => '-39.9825',
        'longitude:' => '19.5351'
    ]
);

foreach ($users as $user) {
    $lat = $user->latitude;
    $lon = $user->longitude;
    $php_array = file_get_contents("http://api.open-notify.org/iss-pass.json?lat=".$lat."&lon=".$lon);
    echo "dates.push(JSON.parse(".$php_array."));";
}
echo "console.log(dates);</script>";
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
	</head>
	<body>
	</body>
</html>