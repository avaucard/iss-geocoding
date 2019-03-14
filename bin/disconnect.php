<?php 
    $_SESSION[''] = null;
    session_destroy();
    header('Location: ../index.php');
?>