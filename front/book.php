<?php
require_once './header-front.php';
require_once './connect.php';
// require_once './footer-front.php';

$id = $_GET['id'];
$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id');
$query->bindParam('id', $id, PDO::PARAM_INT);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <section id="books">
        <?php foreach ($result as $book) { ?>
            <div class="contain">

                <div class="resume">


                    <img id="circe" src="../image/<?= $book['image'] ?>" alt="">
                </div>
                <div class="resum">
                    <h3> <?= $book['title'] ?><br>
                        <?= $book['author'] ?><br>
                        <?= $book['editor'] ?>
                    </h3>
                    <p><?= $book['summary'] ?></p>

                </div>

            </div>
        <?php } ?>

        <hr class="nb1">
        <?php
        $querys = $db->prepare('SELECT `id_book`, `image`, `title`, `author`, `editor`, `genre`, `id_category`,  `status` FROM `book` LIMIT 4');
        $querys->execute();
        $results = $querys->fetchAll(PDO::FETCH_ASSOC); ?>

        <div class="lus">
            <h3 class="read">Les utilisateurs ont également lu</h3>
            <?php foreach ($results as $books) { ?>

                <a href="book.php?id=<?= $books['id_book'] ?>"><img src="../image/<?= $books['image'] ?>" alt="<?= $books['title'] ?>">
                    <p class="titl1"><?= $books['title'] ?></p>
                    <p class="author1"><?= $books['author'] ?> </p>
                <?php } ?>
        </div>

        <hr class="nb1">
        <div class="description">
            <?php foreach ($result as $book) { ?>

                <h3 class="describe">Description du produit</h3>
                <h4 class="bio">Biographie de l'auteur</h4>
                <p class="miller">Madeline Miller est passionnée par la Grèce antique.
                    Après des études d'Histoire et de Littérature classique
                    à Yale, elle devient professeur de grec ancien, de latin,<br>
                    sans oublier les cours qu'elle anime sur l'œuvre
                    de Shakespeare. Le Chant d'Achille est son premier
                    roman, suivi de Circé.</p>

        </div>
        <div class="list">
            <h4 class="detail">Détail du produit</h4>
            <ul class="liste">
                <li><?= $book['editor'] ?> <?= $book['publication_date'] ?></li>
                <li>Langue Français</li>
                <li>Poche: 480 pages</li>
                <li>ISBN: <?= $book['ISBN'] ?></li>
                <li>Poids de l'article : 236 g</li>
                <li>Dimensions: 10.9 x 2 x 17.8 cm
                </li>

            </ul>
        <?php } ?>
        </div>


        <hr class="nb1">
        <h3 class="dispo">Disponibles dans la même édition</h3>
        <?php
        $reqSameEdition = $db->prepare("SELECT * FROM `book` WHERE `editor` = (SELECT `editor` FROM `book` WHERE `id_book` = :id)");
        $reqSameEdition->bindParam('id', $id, PDO::PARAM_INT);
        $reqSameEdition->execute();
        $resultEdition = $reqSameEdition->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="livr">
            <?php foreach ($resultEdition as $editions) { ?>

                <div class="item3">
                    <a href="./book.php?id=<?= $editions['id_book'] ?>"><img src="../image/<?= $editions['image'] ?>" alt="<?= $editions['title'] ?>"></a>
                    <p class="title2"><?= $editions['title'] ?></p><br>
                    <p class="author2"><?= $editions['author'] ?></p>
                </div>
            <?php } ?>
        </div>
    </section>
</body>

</html>