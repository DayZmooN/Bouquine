<?php
include './header-admin.php';
require_once './auth.php';
$req = $db->prepare('SELECT `id_genre`, `libel_genre`, `genre_slug` FROM `genre`');
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">menu genres</h1>

<div class="genreList">
    <div class="unite">
        <h3>genre </h3>

        <a class="btnGreen" href="#" style="color:green">modifier</a>
        <a class="btnRed" href="#" style="color:red">supprimer</a>

    </div>

    <div class="unite">
        <h3>genre </h3>

        <a class="btnGreen" href="#" style="color:green">modifier</a>
        <a class="btnRed" href="#" style="color:red">supprimer</a>

    </div>

    <div class="unite">
        <h3>genre </h3>

        <a class="btnGreen" href="#" style="color:green">modifier</a>
        <a class="btnRed" href="#" style="color:red">supprimer</a>

        <button><a href="./addgenre.php">modifier / supprimer</a></button>

    </div>