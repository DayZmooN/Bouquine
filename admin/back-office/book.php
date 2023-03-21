<?php
session_start();
require_once './auth.php';
$id = $_GET['id'];
$id_user = $_SESSION['id_user'];

if(isset($_POST['rent']))
$checkStatus = $db->prepare("SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id");
$checkStatus->bindParam('id', $id, PDO::PARAM_INT);
$checkStatus->execute();

if($checkStatus->rowcount() == 0) {
    echo "Ce livre n'est pas disponible pour le moment.";
} else {
    $loan_date = date('Y-m-d H:i:s');
    $return_date = date('Y-m-d H:i:s', strtotime('+3 hours'));
    $rent = $db->prepare("INSERT INTO loan (id_book, id_user, loan_date, return_date) VALUES (:id_book, :id_user, NOW(), $return_date)");
    $rent->bindParam('id',$id, PDO::PARAM_INT);
    $rent->bindParam('id_user',$id_user, PDO::PARAM_INT);
    $rent->execute();
    if($rent->rowCount() > 0){
        echo "Votre réservation à été enregistrer.";
    } else {
        echo "Une erreur est survenue lors de votre demande.";
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
        <?php } ?>
        <hr class="nb1">
        <?php foreach ($result as $book) { ?>
            <div class="list">
                <h4 class="detail">Détail du produit</h4>
                <ul class="liste">
                    <li><?= $book['editor'] ?> <?= $book['publication_date'] ?></li>
                    <li>ISBN: <?= $book['ISBN'] ?></li>
                </ul>
            <?php } ?>
            </div>
            <input type="submit" name="rent" value="Réserver">
            <input type="submit" name="return" value="Return">
    </section>
</body>

</html>