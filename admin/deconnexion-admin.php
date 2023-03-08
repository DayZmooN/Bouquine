<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: ../index.php");
    exit;
}

//supprime une variable sa supprime que la partie user 
unset($_SESSION["admin"]);

header("location:./connexion-admin.php");
