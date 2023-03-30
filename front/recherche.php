<?php
require_once './connect.php';
require_once './header-front.php';


if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    $query = $db->prepare('SELECT  `book`.`id_book`, `book`.`ISBN`, `book`.`image`, `book`.`title`, `book`.`author`, `book`.`editor`, `book`.`collection`, `book`.`publication_date`, `book`.`genre`, `book`.`id_category`, `book`.`summary`, `book`.`status`, `genre`.`libel_genre` FROM `book` INNER JOIN `genre_book` ON `genre_book`.`id_book` = `book`.`id_book` INNER JOIN `genre` ON `genre`.`id_genre` = `genre_book`.`id_genre`
        WHERE `title`  LIKE :search OR `author` LIKE :search OR `ISBN` LIKE :search OR `libel_genre` LIKE :search GROUP BY `id_book` ');
    $query->bindValue(':search', "%$search_term%", PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>

<body>
    <section id="catalogue">
        <div class="catal">

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
                    } else if (isset($result)) { ?>
                        <p>Aucun livre n'a été trouvé.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>