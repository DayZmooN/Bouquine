<?php
require_once '../connexion.php';
include './header-admin.php';

$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book`');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">menus articles</h1>

<div id="menu-article">
    <form action="" method="post">
        <input class="recherche" type="search" name="recherche" placeholder="rechercher directement un ouvrage">
        <button><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
    </form>
    <a href="./add.php">ajouter de nouveaux livres</a>
</div>
<div id="menu-article">
    <form action="" method="post">
        <input class="recherche" type="search" name="recherche" placeholder="rechercher directement un ouvrage">
        <button><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
    </form>
    <a href="./add.php">ajouter de nouveaux livres</a>
</div>

<div id="menu-recherche-article">
    <h2>liste des articles</h2>

    <div id="nav-search">
        <img src="../image/filtre.png" alt="icones de reglages des criteres d'affichage" title="filtre de recherche">
        <nav>
            <ul>
                <li class="entree">
                    <a href="#">dates</a>
                    <ul class="sousMenuDate">
                        <li><a href="#">+ recent </a></li>
                    </ul>
                </li>

                <li class="entree"><a href="#">categories</a>
                    <ul class="sousMenuCategorie">
                        <li><a href="#">liste des catégories</a></li>
                    </ul>
                </li>

                <li class="entree"><a href="#">genres</a>
                    <ul class="sousMenuGenre">
                        <li><a href="#">liste des genres</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

</div>
<?php
foreach ($result as $article) {
?>
    <div class="articleList">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['publication_date'] ?></p>
        <p><?= $article['author'] ?></p>
        <div id="bouton">
            <p>
                <a class="btnGreen" href="#" style="color:green">modifier</a> /
                <a class="btnRed" href="#" style="color:red">supprimer</a>
            </p>
        </div>
    </div>
<?php } ?>


<td><a href="edit.php?id=<?= $article['id_book'] ?>" class="update">Modifier</a>

    <a href="./delete.php?id=<?= $article['id_book'] ?>" class="delete" data-toogle='pop' data-target='.pop' data-title="<?= $article['title'] ?>" data-id="<?= $article['id_book'] ?>">Supprimer</a>

    <a href="./coverupload.php?id=<?= $article['id_book'] ?>">Ajouter l'image de couverture</a>

    <a href="./addgenre.php?id=<?= $article['id_book'] ?>">Ajouter genres</a>
</td>
</tr>


</tbody>
<script src="./JS/admin.js"></script>
</body>

</html>