<?php
require_once './connect.php';
require_once './header-front.php';
require_once './footer-front.php';

if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    $query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `title` LIKE :search OR `author` LIKE :search OR `ISBN` LIKE :search');
    $query->bindValue(':search', "%$search_term%", PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>

<body>
    <section id="catalogue">
        <div class="catal">
            <div class="formul-s">
                <form action="./search.php" method="get">
                    <label for="search-book">Recherche</label>
                    <input type="text" id="search-book" name="search" placeholder="Recherche">
                    <button id="btn-search" type="submit">Rechercher</button>
                </form>
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
                    } else if (isset($result)) { ?>
                        <p>Aucun livre n'a été trouvé.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>