<?php
require_once './auth.php';
include './header-admin.php';

$req = $db->prepare('SELECT `id_genre`, `libel_genre`, `genre_slug` FROM `genre`');
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">menu genres</h1>

<div id="ajoutGenre">
    <form class="ajout" action="" method="post">

        <input class="newGenre" type="text" name="libel_genre" placeholder="nouveau genre">
        <input class="slugGenre" type="text" name="genre_slug" placeholder="champ du slug">
        <input class="subGenre" type="submit" name="submitAdd" value="Ajouter">

    </form>
</div>

<div class="genreList">
    <?php
    foreach ($resultat as $genre) {
    ?>
        <div class="unite">
            <h3><?= $genre['libel_genre'] ?></h3>

            <a class="btnGreen" href="./genreaddedit.php?id=<?= $genre['id_genre'] ?>" style="color:green">modifier</a>
            <a class="btnRed" data-idbook="<?= $genre['id_genre'] ?>" data-title="<?= $genre['libel_genre'] ?>" style="color:red">supprimer</a>

        </div>
    <?php } ?>