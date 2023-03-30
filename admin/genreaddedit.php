<?php
require_once './auth.php';
$id = $_GET['id'];

$req = $db->prepare('SELECT `id_genre`, `libel_genre`, `genre_slug` FROM `genre` WHERE `id_genre` = :id');
$req->bindParam(':id', $id, PDO::PARAM_INT);
$req->execute();
$genre = $req->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submitEdit'])) {
    $libelGenre = $_POST['libel_genre'];
    $genreSlug = $_POST['genre_slug'];
    $reqEdit = $db->prepare("UPDATE `genre` SET `libel_genre`=:libel_genre, `genre_slug`=:genre_slug WHERE `id_genre`=:id");
    $reqEdit->bindParam(':libel_genre', $libelGenre, PDO::PARAM_STR);
    $reqEdit->bindParam(':genre_slug', $genreSlug, PDO::PARAM_STR);
    $reqEdit->bindParam(':id', $id, PDO::PARAM_INT);
    $reqEdit->execute();

    $_SESSION['success'] = "Genre édité avec succès !";
    header('Location: ./genre.php');
    exit();
}

include './header-admin.php';
?>
<h1 class="multiTitre">modifications genres</h1>
<h2 class="titleEditGenre">Modification de <?= $genre['libel_genre'] ?></h2>

<div id="sectionEditGenre">
    <form class="edit" action="" method="post">
        <input class="editGenre" type="text" name="libel_genre" value="<?= $genre['libel_genre'] ?>">
        <input class="editSlugGenre" type="text" name="genre_slug" value="<?= $genre['genre_slug'] ?>">
        
        <input class="subEditGenre" type="submit" name="submitEdit" value="Modifier">
</div>
</form>
</div>