<?php
require_once '../connexion.php';
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
    <a href="./add.php">ajouter de nouveaux livres</a>
</div>


    <h2 class="sousTitre" >liste des articles</h2>

<?php
foreach ($result as $article) {
?>
    <div class="articleList">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['publication_date'] ?></p>
        <p><?= $article['author'] ?></p>
        <div id="bouton">
            <p>
                <a class="btnGreen" href="edit.php?id=<?= $article['id_book'] ?>" style="color:green">modifier /</a>

                <a class="btnRed" href="#" data-title="<?= $article['title'] ?>" data-id="<?= $article['id_book'] ?> style=" color:red">supprimer /</a>

                <a href="./coverupload.php?id=<?= $article['id_book'] ?>">Ajouter l'image de couverture /</a>

                <a href="./linkgenrebook.php?id=<?= $article['id_book'] ?>">Ajouter genres</a>
            </p>
        </div>
    </div>
<?php } ?>