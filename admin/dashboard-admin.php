<?php
//on démarre une session PHP on ecrit a chaquer page ou veut rester connecter en debut 
session_start();

// if (!isset($_SESSION["admin"])) {
//     header("location: ./dashboard-admin.php");
//     exit;
// }

// on inclut le header 
include_once './header-admin.php';
?>


<h1 class="multiTitre">tableau de bord</h1>

<div id="compteurEtGraphique">
    <p>a venir en bonus graphique et affichage de compteurs</p>
</div>

<h2 id="dernier-ajout">liste des derniers ajouts</h2>

<div class="articleList">
    <h3>titre du livre</h3>
    <p>auteur</p>
    <p>date d'ajout</p>
    <div id="bouton">
        <p>
            <a class="btnGreen" href="#" style="color:green">modifier</a> / 
            <a class="btnRed" href="#" style="color:red">supprimer</a>
        </p>
    </div>
</div>



<div class="articleList">
    <h3>titre du livre</h3>
    <p>auteur</p>
    <p>date d'ajout</p>
    <div id="bouton">
        <p>
            <a class="btnGreen" href="#" style="color:green">modifier</a> / 
            <a class="btnRed" href="#" style="color:red">supprimer</a>
        </p>
    </div>
</div>

<div class="articleList">
    <h3>titre du livre</h3>
    <p>auteur</p>
    <p>date d'ajout</p>
    <div id="bouton">
        <p>
            <a class="btnGreen" href="#" style="color:green">modifier</a> / 
            <a class="btnRed" href="#" style="color:red">supprimer</a>
        </p>
    </div>
</div>

<div class="articleList">
    <h3>titre du livre</h3>
    <p>auteur</p>
    <p>date d'ajout</p>
    <div id="bouton">
        <p>
            <a class="btnGreen" href="#" style="color:green">modifier</a> / 
            <a class="btnRed" href="#" style="color:red">supprimer</a>
        </p>
    </div>
</div>













</main>
</div>