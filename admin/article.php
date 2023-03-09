<?php
require_once '../connexion.php';

// READ
// Requête SQL -> Récupère TOUTES les données de TOUS les books de la DB
$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book`');
$query->execute();
// Stocke requête dans tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>

<body>
<h1>Liste des articles</h1>
<h2><a href="add.php" class="add">Ajouter un nouvel article</a></h2>
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

                    <td><a href="edit.php?id=<?= $article['id_book'] ?>" class="update">Modifier</a>

                    <a href="./delete.php?id=<?= $article['id_book'] ?>" class="delete" data-toogle='pop' data-target='.pop' data-title="<?= $article['title'] ?>" data-id="<?= $article['id_book'] ?>">Supprimer</a>

                    <a href="./coverupload.php?id=<?= $article['id_book'] ?>">Ajouter l'image de couverture</a>

                    <a href="./addgenre.php?id=<?= $article['id_book'] ?>">Ajouter genres</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    <script src="./JS/admin.js"></script>
</body>

</html>