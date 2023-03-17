<?php
session_start();
require_once '../auth.php';
$id = $_GET['id'];

$req = $db->prepare('SELECT `id_genre`, `libel_genre`, `genre_slug` FROM `genre` WHERE `id_genre` = :id');
$req->bindParam(':id', $id, PDO::PARAM_INT);
$req->execute();
$genre = $req->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
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
?>

<h1>Modification de <?= $genre['libel_genre'] ?></h1>
<form method="POST">
    <label for="libel_genre">Libellé du genre :</label>
    <input type="text" name="libel_genre" id="libel_genre" value="<?= $genre['libel_genre'] ?>">

    <label for="genre_slug">Slug :</label>
    <input type="text" name="genre_slug" id="genre_slug" value="<?= $genre['genre_slug'] ?>">

    <button type="submit" name="submit">Enregistrer</button>
</form>