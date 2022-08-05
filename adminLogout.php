<?php 

    session_start();
    unset($_SESSION['adminLoggedIn']);
    session_destroy();
    header("Location: welcomeScreen.php");

?>