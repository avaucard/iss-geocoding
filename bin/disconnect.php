<?php 
    $_SESSION['username'] = null;
    $_SESSION['password'] = null;
    session_destroy();
    header('Location: ../index.php');
?>