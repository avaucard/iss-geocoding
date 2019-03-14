<?php
session_start();
require_once 'API/DatabaseAPI.php';

$api = new DatabaseAPI();
$api->connectUser($_POST['username'], $_POST['password']);

?>