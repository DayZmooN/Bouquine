<!-- ajax created by dayzmoon -->
<?php
require_once './connect.php';

// On vérifie si le filtre genre est défini
$genre_filter = isset($_GET["genre"]) ? $_GET["genre"] : "";

// On prépare la requête en utilisant un paramètre nommé
$query = $db->prepare('SELECT DISTINCT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `genre` LIKE :genre');
$query->bindValue(':genre', "%$genre_filter%", PDO::PARAM_STR);

// On exécute la requête
$query->execute();

// On récupère les résultats
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// On encode les résultats en JSON
$json = json_encode($result);

// On envoie le résultat encodé en JSON au client
header('Content-Type: application/json');
// echo $json;
?>
<div class="books">
    <div class="container-books">
        <?php if (isset($result) && $result) {
            foreach ($result as $book) { ?>
                <div class="books-catalog">
                    <div class="item4">
                        <a href="./book.php?id=<?= $book['id_book'] ?>"><img src="../image/<?= $book['image'] ?>" alt="<?= $book['title'] ?>"></a>
                        <p class="titles"><?= $book['title'] ?></p>
                        <p class="authors"><?= $book['author'] ?></p>
                    </div>
                </div>
            <?php }
        } else { ?>
            <p>Aucun livre n'a été trouvé.</p>
        <?php } ?>
    </div>
</div>