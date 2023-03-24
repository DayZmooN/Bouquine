<?php
require_once './auth.php';
include './header-admin.php';

$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` ORDER BY `id_book` DESC');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">menus articles</h1>

<div id="articleSearchAjout">
    <form action="" method="post">
        <input class="recherche" type="search" name="recherche" placeholder="rechercher directement un ouvrage">
        <button><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
    </form>
    <a href="./articleadd.php">Ajouter de nouveaux livres</a>
</div>


<h2 class="sousTitre">liste des articles</h2>

<?php
foreach ($result as $article) {
?>
    <div class="articleList">
        <h3><?= $article['title'] ?></h3>
        <div class="dernierAjoutMQ">
            <p><?= $article['author'] ?></p>
            <p><?= $article['publication_date'] ?></p>
        </div>
        <div id="bouton">

            <a class="btnGreen" href="./articleedit.php?id=<?= $article['id_book'] ?>" style="color:green">Modifier</a>
            <a class="btnRed" data-idbook="<?= $article['id_book'] ?>" data-title="<?= $article['title'] ?>" style="color:red">Supprimer</a>

            <a href=" ./coverupload.php?id=<?= $article['id_book'] ?>" style="color:blueviolet">Cover</a>
            <a href="./articlelinkgenre?id=<?= $article['id_book'] ?>" style="color:aqua">Genres</a>

        </div>
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


</body>