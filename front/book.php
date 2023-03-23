<?php
require_once './header-front.php';
require_once './connect.php';
require_once './footer-front.php';

$id = $_GET['id'];
$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id');
$query->bindParam('id', $id, PDO::PARAM_INT);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $book)

    if (isset($_POST['rent'])) {
        $id_user = $_SESSION["user"]["id"];
        $req = $db->prepare("SELECT `id_book`,`status` FROM `book` WHERE `id_book` = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $checkStatus = $req->fetchAll(PDO::FETCH_ASSOC);
        //fetch données, if (book.status = 0) → pas dispo, si 1 → dispo

        if ($checkStatus[0]['status'] == 0) {
            $_SESSION['message'] = "Ce livre n'est pas disponible pour le moment.";
            header("Location: ./book.php?id=" . $book['id_book']);
            exit();
            unset($_SESSION['message']);
        } else {
            $loan_date = date('Y-m-d H:i:s');
            $return_date = date('Y-m-d H:i:s', strtotime('+3 hours'));
            $rent = $db->prepare("INSERT INTO loan (id_book, id_user, loan_date, return_date) VALUES (:id_book, :id_user, NOW(), '$return_date')");
            $rent->bindParam(':id_book', $id, PDO::PARAM_INT);
            $rent->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $rent->execute();
            $statusUpdate = $db->prepare("UPDATE `book` SET `status`='0' WHERE `id_book` = :id");
            $statusUpdate->bindParam(':id', $id, PDO::PARAM_INT);
            $statusUpdate->execute();
            $_SESSION['message'] = "Votre réservation a été enregistrée.";
            header("Location: ./book.php?id=" . $book['id_book']);
            exit();
            
        }
    }
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
            <form action="" method="post">
                <input type="submit" name="rent" value="Réserver">
            </form>
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
                <p class="miller">Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>
                    Asperiores suscipit non atque ipsa ullam quos aperiam debitis libero, accusamus vitae a alias quidem exercitationem neque perferendis quibusdam provident qui impedit!</p>

        </div>
        <div class="list">
            <h4 class="detail">Détail du produit</h4>
            <ul class="liste">
                <li><?= $book['editor'] ?> <?= $book['publication_date'] ?></li>
                <li>Langue Français</li>
                <li>Poche: 480 pages</li>
                <li>ISBN: <?= $book['ISBN'] ?></li>
                <li>Poids de l'book : 236 g</li>
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
        <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p id="message"><?php echo $_SESSION['message']; ?></p>
                    </div>
                </div>
    </section>
</body>
<script src="../js/main.js"></script>

</html>