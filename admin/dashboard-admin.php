<?php
session_start();
require_once './auth.php';
include_once './header-admin.php';
//on demarre une session PHP on ecrit a chaquer page ou veut rester connecter en debut 

// if (!isset($_SESSION["admin"])) {
//     header("location: ./dashboard-admin.php");
//     exit;
// }
$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` ORDER BY `id_book` DESC LIMIT 6');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<h1 class="multiTitre">tableau de bord</h1>

<div id="compteurEtGraphique">
    <p>a venir en bonus graphique et affichage de compteurs</p>
</div>

<h2 id="dernier-ajout">liste des derniers ajouts</h2>
<?php
foreach ($result as $article) {
?>
    <div class="articleList">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['author'] ?></p>
        <p><?= $article['publication_date'] ?></p>
        <div id="bouton">
            <p>
                <a class="btnGreen" href="#" style="color:green">modifier</a> /
                <a class="btnRed" href="#" style="color:red">supprimer</a>
            </p>
        </div>
    </div>
<?php
}
?>