<?php
require_once './auth.php';
include './header-admin.php';

$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book`');
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


<h2 class="sousTitre">Liste des articles</h2>

<?php
foreach ($result as $article) {
?>
    <div class="articleList">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['publication_date'] ?></p>
        <p><?= $article['author'] ?></p>
        <div id="bouton">

            <a class="btnGreen" href="./articleedit.php?id=<?= $article['id_book'] ?>" style="color:green">Modifier</a>
            <a class="btnRed" data-idbook="<?= $article['id_book'] ?>" data-title="<?= $article['title'] ?>" style="color:red">Supprimer</a>

        </div>
    </div>
<?php } ?>
</body>