<?php
require_once './auth.php';
include_once './header-admin.php';
//on demarre une session PHP on ecrit a chaquer page ou veut rester connecter en debut 


$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` ORDER BY `id_book` DESC LIMIT 6');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<h1 class="multiTitre">tableau de bord</h1>

<div id="compteurEtGraphique">
    <p>a venir en bonus graphique et affichage de compteurs</p>
</div>

<h2 id="titreAjout">liste des derniers ajouts</h2>
<?php
foreach ($result as $article) {
?>

    <div class="articleList, dernierAjout">
        <h3><?= $article['title'] ?></h3>
        <div class="dernierAjoutMQ">
            <p><?= $article['author'] ?></p>
            <p><?= $article['publication_date'] ?></p>
        </div>
        <div id="bouton">
            <p>
                <a class="btnGreen" href="#" style="color:green">modifier</a> /
                <?php
                if (isset($_SESSION['admin'])) { ?>
                    <a class="btnRed" data-idBook=<?= $article['id_book'] ?> data-title=<?= $article['title'] ?> style="color:red">supprimer</a>
                <?php } ?>
            </p>
        </div>
    </div>
<?php

}

?>