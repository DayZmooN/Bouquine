<?php
//on démarre une session PHP on ecrit a chaquer page ou veut rester connecter en debut 
session_start();
if (!isset($_SESSION["user"])) {
    header("location: connexion.php");
    exit;
}
// on inclut le header 
include_once './header.php';
?>
<h1>test user</h1>


<!-- <h1>Profil de <?= $_SESSION["user"]["username"] ?></h1>
<p>Lastname :<?= $_SESSION["user"]["lastname"] ?></p>
<p>Email : <?= $_SESSION["user"]["mail"] ?></p>
<p>phone : <?= $_SESSION["user"]["phone"] ?></p>
<p>birthday : <?= $_SESSION["user"]["birthdate"] ?></p> -->