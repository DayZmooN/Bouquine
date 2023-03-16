<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location: accueil.php");
    exit;
}

//supprime une variable sa supprime que la partie user 
unset($_SESSION["user"]);

header("location: ./accueil.php");
