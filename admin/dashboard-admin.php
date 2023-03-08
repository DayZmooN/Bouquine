<?php
//on démarre une session PHP on ecrit a chaquer page ou veut rester connecter en debut 
session_start();

if (!isset($_SESSION["admin"])) {
    header("location: ./connexion-admin.php");
    exit;
}

// on inclut le header 
include_once './header-admin.php';
?>

<h1>test admin</h1>