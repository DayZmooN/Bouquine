<?php
require_once './header-front.php';
require_once './connect.php';
// require_once './footer-front.php';
$id = $_GET['id'];
$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id');
$query->bindParam('id', $id, PDO::PARAM_INT);
$query->execute();
$query->fetch(PDO::FETCH_ASSOC);

?>

<body>
    <section id="books">
        <?php foreach ($query as $book) { ?>
            <div class="contain">
                <div class="resume">
                    <img id="circe" src="../image/<?= $book['image'] ?>" alt="livre Circé de Madeleine Miller">
                </div>
                <div class="resum">
                    <h3><?= $book['title'] ?><br>
                        <?= $book['author'] ?><br>
                        <?= $book['editor'] ?>
                    </h3>
                    <p><?= $book['summary'] ?></p>
                </div>
            <?php } ?>
            </div>
            <hr class="nb1">
            <div class="lus">
                <h3 class="read">Les utilisateurs ont également lu</h3>
                <a href="#"><img src="../image/le chant d achille.jpg" alt="le chant d achille de MAdeleine Miller">
                    <p class="titl1">Le chant d'Achille </p>
                    <p class="author1">Madeline Miller </p>

                    <a href="#"><img src="../image/assasin royal.jpg" alt="L'assassin royal de Robin Hobb ">
                        <p class="titl1">L'assassin royal</p>
                        <p class="author1">Robin HOBB </p>

                        <a href="#"><img src="../image/la-croisade-eternelle.jpg" alt="la croisade eternelle de Victor Fleury">
                            <p class="titl1">La croisade éternelle </p>
                            <p class="author1">Victor FLEURY </p>

                            <a href="#"><img src="../image/sistine.jpg" alt="Sixtine de Caroline Vermalle">
                                <p class="titl1">Sixtine </p>
                                <p class="author1">Caroline VERMALLE </p>
            </div>
            <hr class="nb1">
            <div class="description">

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
                    <li> Éditeur Pocket (12 janvier 2023)</li>
                    <li>Langue Français</li>
                    <li>Poche: 480 pages</li>
                    <li>ISBN-13 : 978-2266334426</li>
                    <li>Poids de l'article : 236 g</li>
                    <li>Dimensions: 10.9 x 2 x 17.8 cm
                    </li>

                </ul>
            </div>
            <hr class="nb1">
            <h3 class="dispo">Disponibles dans la même édition</h3>

            <div class="livr">

                <div class="item3">
                    <a href="#"><img src="../image/star wars.jpg" alt="Star wars de Mike CHEN"></a>
                    <p class="title2">STAR WARS</p><br>
                    <p class="author2">Mike CHEN</p>
                </div>

                <div class="item3"><a href="#"><img src="../image/romance.jpg" alt="Romance d'Arnaud CATHERINE "></a>
                    <p class="title2">ROMANCE</p><br>
                    <p class="author2">Arnaud CATHERINE</p>
                </div>

                <div class="item3"><a href="#"><img src="../image/assasin royal.jpg" alt="L'assasin Royal de Robin HOBB "></a>
                    <p class="title2">L'ASSASIN ROYAL </p><br>
                    <p class="author2">Robin HOBB</p>
                </div>
            </div>
            </div>
    </section>
</body>

</html>