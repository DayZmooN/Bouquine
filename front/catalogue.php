<?php
require_once './header-front.php';
require_once './footer-front.php';
require_once './connect.php';
$query = $db->prepare('SELECT `id_book`,  `image`, `title`, `author`, `status` FROM `book` ');
$query->execute();
?>

<body>
    <section id="catalogue">
        <div class="catal">

            <h2 class="catalog">Catalogue</h2>

            <div class="formul-s">
                <form action="#" method="get">
                    <label for="search-book">Recherche</label>
                    <input type="text" id="search-book" name="search-book" placeholder="Recherche">
                    <button type="submit">
                </form>


            </div>
            <div class="books">

                <div class="container-books">
                    <div class="books-catalog">
                        <div class="item4">
                            <a href="#"><img src="../image/malgre nous.jpg" alt="Malgré nous de Claire NORTON"></a>
                            <p class="titles">Malgré nous </p>
                            <p class="authors">Claire NORTON</p>
                        </div>
                        <div class="item4"><a href="#"><img src="../image/romance.jpg" alt="Romance d'Arnaud CATHERINE"></a>
                            <p class="titles">ROMANCE</p>
                            <p class="authors">Arnaud CATHERINE</p>
                        </div>
                        <div class="item4"><a href="#"><img src="../image/une toute derniere fois.jpg" alt="Une toute dernère fois d'Emma GREEN "></a>
                            <p class="titles">Une toute dernière fois </p>
                            <p class="authors">Emma GREEN</p>
                        </div>

                        <div class="item4"><a href="#"><img src="../image/dark romance.jpg" alt="Dark Romance de Péneloppe DOUGLAS "></a>
                            <p class="titles">DARK ROMANCE</p>
                            <p class="authors">Péneloppe DOUGLAS</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        </div>
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