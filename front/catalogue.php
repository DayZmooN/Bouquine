<?php
require_once './header-front.php';

require_once './connect.php';
$query = $db->prepare('SELECT id_book,  image, title, author, status FROM book ');
$query->execute();
?>


<body>
    <section id="catalogue">
        <div class="catal">

            <h2 class="catalog">Catalogue</h2>



            <div class="container-books">
                <?php foreach ($query as $book) { ?>
                    <div class="books-catalog">
                        <div class="item4">
                            <a href="./book.php?id=<?= $book['id_book'] ?>"><img src="../image/<?= $book['image'] ?>" alt="<?= $book['title'] ?>"></a>
                            <p class="titles"><?= $book['title'] ?></p>
                            <p class="authors"><?= $book['author'] ?></p>
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

</body>

</html>