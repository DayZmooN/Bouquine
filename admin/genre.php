<?php
require_once './auth.php';
include './header-admin.php';

$req = $db->prepare('SELECT `id_genre`, `libel_genre`, `genre_slug` FROM `genre`');
$req->execute();
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

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
?>

<h1 class="multiTitre">menu genres</h1>

<div id="ajoutGenre">
    <form class="ajout" action="" method="post">

        <input class="newGenre" type="text" name="libel_genre" placeholder="nouveau genre" required>
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
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success" style="background-color: #209f00a8;">
            <p><?= $_SESSION["success"] ?></p>
        </div>
        <?php unset($_SESSION["success"]); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error" style="background-color: #b50000a8;">
            <p><?= $_SESSION["error"] ?></p>
        </div>
        <?php unset($_SESSION["error"]); ?>
    <?php endif; ?>