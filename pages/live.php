<?php
$lifetime=600;
session_set_cookie_params($lifetime);
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    // header('Location: ../index.php?error=2');
}
require "../bin/API/DatabaseAPI.php";
$api = new DatabaseAPI();
$coords = $api->selectLongLat();

$iss_position = json_decode(file_get_contents("http://api.open-notify.org/iss-now.json"))->iss_position;



echo "<script>var users =".json_encode($coords).";var iss_position=".json_encode($iss_position)."</script>";
?> 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="icon" href="../iss/img/favicon.ico"/>
    <title>Live view</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
            crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <script src="../iss/js/index.js"></script>
</head>

<body class="live">
    <a href="./home.php"><button class="return" style="position:fixed;">Return</button></a>
    
    <a href="./profile.php"><i class="fas fa-user-circle profile"></i></a>
       
    <h1 id="title"></h1>
    <h2 id="user"></h2>
    <div id="map"></div>
</body>

</html>