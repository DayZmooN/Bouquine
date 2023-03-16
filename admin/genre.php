<?php
require_once './auth.php';
include './header-admin.php';

$req = $db->prepare('SELECT `id_genre`, `libel_genre`, `genre_slug` FROM `genre`');
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">menu genres</h1>

<div class="genreList">
<?php
    foreach ($resultat as $genre) {
?>
    <div class="unite">
        <h3><?= $genre['libel_genre'] ?></h3>

        <a class="btnGreen" href="#" style="color:green">modifier</a>
        <a class="btnRed" href="./genre/deletegenre.php?id=<?= $genre['id_genre'] ?>" style="color:red">supprimer</a>

    </div>
<?php } ?>