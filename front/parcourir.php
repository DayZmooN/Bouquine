<?php
require_once './header-front.php';
require_once '../connexion.php';

$id = $_GET['id'];

$query = $db->prepare('SELECT book.* FROM book INNER JOIN category ON book.id_category = category.id_category WHERE category.id_category = :id');
$query->bindParam('id', $id, PDO::PARAM_INT);

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);
?>

<body>
    <section id="catalogue">
        <div class="catal">
            <div class="formul-s">
                <div class="books">
                    <div class="container-books">
                        <?php if ($result) {
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
                            <p>Aucun livre n'a été trouvé dans cette catégorie.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>