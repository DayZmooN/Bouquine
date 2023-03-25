<?php
require_once './connect.php';
require_once './header-front.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


// On récupère les données encodées en JSON depuis la requête POST
$datas = json_decode(file_get_contents('php://input'), true);
// On vérifie si le filtre genre est défini
$genre_filter = isset($datas["genre"]) ? $datas["genre"] : "";

$query = $db->prepare('SELECT DISTINCT  `book`.`id_book`, `book`.`ISBN`, `book`.`image`, `book`.`title`, `book`.`author`, `book`.`editor`, `book`.`collection`, `book`.`publication_date`, `book`.`genre`, `book`.`id_category`, `book`.`summary`, `book`.`status`, `genre`.`libel_genre` FROM `book` INNER JOIN `genre_book` ON `genre_book`.`id_book` = `book`.`id_book` INNER JOIN `genre` ON `genre`.`id_genre` = `genre_book`.`id_genre` WHERE `genre` LIKE :genre ');
$query->bindValue(':genre', "%$genre_filter%", PDO::PARAM_STR);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($result);
?>

<section id="catalogue">
    <div class="catal">
        <div class="formul-s">

        </div>
        <div class="genre-filter">
            <?php foreach ($result as $datas) { ?>
                <button class="genre-btn" data-genre="<?= $datas['libel_genre'] ?>"><?= $datas['libel_genre'] ?></button>

            <?php } ?>
        </div>
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
    </div>
</section>

<script src="../js/ajax.js"></script>
</body>


</html>