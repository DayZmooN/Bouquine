<?php
include './header-admin.php';
require_once './auth.php';
$req = $db->prepare('SELECT `id_genre`, `libel_genre`, `genre_slug` FROM `genre`');
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">menu genres</h1>

<aside class="categorieGenre">

    <h2>liste des genres</h2>

    <ol>
        <?php
        foreach ($resultat as $genre) {
        ?>
            <li><?= $genre['libel_genre'] ?></li>
        <?php } ?>
    </ol>

    <button><a href="./addeditgenre.php">modifier / supprimer</a></button>

</aside>