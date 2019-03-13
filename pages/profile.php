<?php
session_start();
if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    header('Location: ../index.php?error=2');
}
require "../bin/API/DatabaseAPI.php";
?> 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/main.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <a href="./home.php"><button class="return" style="position:fixed;">Return</button></a>
    <h1>Profile Informations</h1>
    <div class="profile-infos">
        <div class="profile-info">Firstname: <p><?= $_SESSION['firstname'] ?></p></div>
        <div class="profile-info">Surname: <p><?= $_SESSION['surname'] ?></p></div>
        <div class="profile-info">Username: <p><?= $_SESSION['username'] ?></p></div>
        <div class="profile-info">Email: <p><?= $_SESSION['email'] ?></p></div>
        <div class="profile-info">Address: <p><?= $_SESSION['city'] ?></p></div>
        <div class="profile-info">Zip Code: <p><?= $_SESSION['zip_code'] ?></p></div>
        <div class="profile-info">Zip Code: <p><?= $_SESSION['country'] ?></p></div>
    </div>
    


    
</body>

</html>