<?php
require_once './auth.php';
include './header-admin.php';


?>
<?php if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    $query = $db->prepare('SELECT DISTINCT `book`.`id_book`, `book`.`ISBN`, `book`.`image`, `book`.`title`, `book`.`author`, `book`.`editor`, `book`.`collection`, `book`.`publication_date`, `book`.`genre`, `book`.`id_category`, `book`.`summary`, `book`.`status`, `genre`.`libel_genre`
    FROM `book`
    INNER JOIN `genre_book` ON `genre_book`.`id_book` = `book`.`id_book`
    INNER JOIN `genre` ON `genre`.`id_genre` = `genre_book`.`id_genre`
    WHERE `title`  LIKE :search OR `author` LIKE :search OR `ISBN` LIKE :search OR `libel_genre` LIKE :search
    GROUP BY `id_book`
    ');
    $query->bindValue(':search', "%$search_term%", PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
<h1 class="multiTitre">menus articles</h1>

<div id="articleSearchAjout">
    <form action="" method="GET">
        <input class="recherche" type="text" name="search" placeholder="rechercher directement un ouvrage">

        <button type="submit
        "><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
    </form>
    <a href="./articleadd.php">Ajouter de nouveaux livres</a>
</div>


<h2 class="sousTitre">liste des articles</h2>

<?php
if (isset($result) && $result) {
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
    <?php }
} else if (isset($result)) { ?>
    <p>Aucun livre n'a été trouvé.</p>
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