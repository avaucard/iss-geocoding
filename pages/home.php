<?php
$lifetime=600;
session_set_cookie_params($lifetime);
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    // header('Location: ../index.php?error=2');
}
require "navbar.php";
require "../bin/API/DatabaseAPI.php";
$api = new DatabaseAPI();
$coords = $api->selectLongLat();


echo "<script>var dates = [];";

foreach ($coords as $user) {
    $php_array = json_decode(file_get_contents("http://api.open-notify.org/iss-pass.json?lat=".$user->latitude."&lon=".$user->longitude."&n=100"))->response;
    foreach ($php_array as $date) {
        $date->latitude = $user->latitude;
        $date->longitude = $user->longitude;
        $date->name = $user->name;
    }
    echo "dates.push(".json_encode($php_array).");";
}
if (!empty($_POST)) {
    echo "var dateId = ".$_POST['dates'].";";
}
else {
    echo "var dateId = null;";
}
echo "</script>";

?> 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="icon" href="../iss/img/favicon.ico"/>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
            crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
            crossorigin=""></script>
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <script src="../iss/js/dates.js"></script>
</head>

<body class="home">
    <a href="./profile.php"><i class="fas fa-user-circle profile"></i></a>
        <h1 id="title"></h1>
        <div id="map"></div>
        <form id="datesForm" method="post" action="home.php">
            <select id="dates" name="dates">
            </select>
            <input type="submit">
        </form> 
</body>

</html>

<script>
    var formDates = document.getElementById('dates');
    for(var i = 0; i < sortedDates.length; i++) {
        var opt = document.createElement('option');
        opt.innerHTML = new Date(sortedDates[i].risetime * 1000).toLocaleString('en-GB', { timeZone: 'Europe/Paris' }) + " : " +  sortedDates[i].name;
        opt.value = i;
        formDates.appendChild(opt);
    };
</script>