<?php
require_once './auth.php';
if (isset($_POST['submitAdd'])) {
    try {
        $addreq = $db->prepare("INSERT INTO `genre` (`libel_genre`, `genre_slug`) VALUES (:libel_genre, :genre_slug)");
        $addreq->bindValue(":libel_genre", $_POST["libel_genre"], PDO::PARAM_STR);
        $addreq->bindValue(":genre_slug", $_POST["genre_slug"], PDO::PARAM_STR);
        $addreq->execute();
        $_SESSION["success"] = "votre genre a bien été crée";
        header('location: ./genre.php');
    } catch (PDOException $e) {
        $_SESSION["error"] = "Votre Genre n'a pas été crée";
        header('Location: ./genre.php');
        exit();
    }
}

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
            <input class="subEditGenre"type="submit" name="submitEdit" value="Modifier">
        </div>

    </form>

</div>

<?php include './includeClose.php'  ?>



























