<?php

    require_once 'API/DatabaseAPI.php';

    $api = new DatabaseAPI();
    $api->addUser($_POST['username'], $_POST['email'], $_POST['firstname'], $_POST['surname'], $_POST['password'], $_POST['address'], $_POST['zip_code'], $_POST['country']);

?>