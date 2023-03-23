<?php
require_once './connect.php';
require_once './header-front.php';

// On récupère les données encodées en JSON depuis la requête POST
$datas = json_decode(file_get_contents('php://input'), true);
// On vérifie si le filtre genre est défini
$genre_filter = isset($datas["genre"]) ? $datas["genre"] : "";

$query = $db->prepare('SELECT DISTINCT  `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `genre` LIKE :genre');
$query->bindValue(':genre', "%$genre_filter%", PDO::PARAM_STR);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="catalogue">
    <div class="catal">
        <div class="formul-s">

        </div>
        <div class="genre-filter">
            <?php foreach ($result as $datas) { ?>
                <button class="genre-btn" data-genre="<?= $datas['genre'] ?>"><?= $datas['genre'] ?></button>

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


</body>
<script src="../js/ajax.js"></script>

</html>