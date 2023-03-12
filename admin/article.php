<?php
require_once '../connexion.php';
include './header-admin.php';

// READ
// Requête SQL -> Récupère TOUTES les données de TOUS les books de la DB
$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book`');
//$query->execute();
// Stocke requête dans tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">menus articles</h1>

    <div id="menu-article">
        <form action="" method="post">
            <input class="recherche" type="search" name="recherche"  placeholder="rechercher directement un ouvrage" >
            <button><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
        </form>
        <a href="./add.php">ajouter de nouveaux livres</a>
    </div>

    <div id="menu-recherche-article">
        <h2 >liste des articles</h2>

        <div id="nav-search">
            <img src="../image/filtre.png" alt="icones de reglages des criteres d'affichage" title="filtre de recherche">
            <nav>
                <ul  >
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

    <div class="articleList">
        <h3>titre du livre</h3>
        <p>date de publication</p>
        <p>auteur</p>
        <div id="bouton">
            <p>
                <a class="btnGreen" href="#" style="color:green">modifier</a> / 
                <a class="btnRed" href="#" style="color:red">supprimer</a>
            </p>
        </div>
    </div>











<?php include './includeClose.php'; ?>  





































<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>

<body>
    <<<<<<< HEAD <h1>Liste des articles</h1>
        <h2><a href="add.php">Ajouter un nouvel article</a></h2>
        =======
        <h1>Liste des articles</h1>
        <h2><a href="add.php" class="add">Ajouter un nouvel article</a></h2>
        >>>>>>> 4a443cc6d4556389edb5dfe9094186c7d5cc8b69
        <table>
            <thead>
                <th>ID</th>
                <th>ISBN</th>
                <th>Nom de cover</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Éditeur</th>
                <th>Collection</th>
                <th>Date de publication</th>
                <th>Genre</th>
                <th>id_category</th>
                <th>Résumé</th>
                <th>Status</th>
            </thead>

        <tbody>
        <?php
            foreach($result as $article){
        ?>
                <tr>
                    <td><?= $article['id_book'] ?></td>
                    <td><?= $article['ISBN'] ?></td>
                    <td><?= $article['image'] ?></td>
                    <td><?= $article['title'] ?></td>
                    <td><?= $article['author'] ?></td>
                    <td><?= $article['editor'] ?></td>
                    <td><?= $article['collection'] ?></td>
                    <td><?= $article['publication_date'] ?></td>
                    <td><?= $article['genre'] ?></td>
                    <td><?= $article['id_category'] ?></td>
                    <td><?= $article['summary'] ?></td>
                    <td><?= $article['status'] ?></td>
                    <td><a href="edit.php?id=<?= $article['id_book'] ?>">Modifier</a>  <a href="delete.php?id=<?= $article['id_book'] ?>">Supprimer</a>
                    <a href="./coverupload.php?id=<?= $article['id_book'] ?>">Ajouter l'image de couverture</a>
                    <a href="./addgenre.php?id=<?= $article['id_book'] ?>">Ajouter genres</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</body>
</html>