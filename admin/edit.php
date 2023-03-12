<?php
require_once '../connexion.php';

// $id = $_GET['id'];
// ?>

<!-- // <section> 
//     <?php
//     $req = $db->prepare("SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id");
//     $req->bindParam('id', $id, PDO::PARAM_INT);
//     $req->execute();

//     while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <h1>Modification de l'article : "<?= $article['title'] ?>, édition : <?= $article['editor'] ?>"</h1>
        <table>
            <thead>
                <th>ID</th>
                <th>ISBN</th>
                <th>Nom de couverture</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Éditeur</th>
                <th>Collection</th>
                <th>Date de publication</th>
                <th>Genre</th>
                <th>id_category</th>
                <th>Résumé</th>
                <th>Status</th>
            </thead>
            <tbody>
                <tr>
                    <form action="#" method="POST">
                        <td><?= $article['id_book'] ?></td>
                        <td><input type="text" name="ISBN" value="<?= $article['ISBN'] ?>" size="8"></td>
                        <td><input type="text" name="image" value="<?= $article['image'] ?>" size="8"></td>
                        <td><input type="text" name="title" value="<?= $article['title'] ?>"></td>
                        <td><input type="text" name="author" value="<?= $article['author'] ?>"></td>
                        <td><input type="text" name="editor" value="<?= $article['editor'] ?>"></td>
                        <td><input type="text" name="collection" value="<?= $article['collection'] ?>" size="8"></td>
                        <td><input type="date" name="publication_date" value="<?= $article['publication_date'] ?>"></td>
                        <td><input type="text" name="genre" value="<?= $article['genre'] ?>"></td>
                        <td><input type="text" name="id_category" value="<?= $article['id_category'] ?>" size="4"></td>
                        <td><input type="text" name="summary" value="<?= $article['summary'] ?>"></td>
                        <td><input type="text" name="status" value="<?= $article['status'] ?>" size="1"></td>
                </tr>
            </tbody> -->
        <!-- <?php //} 
    // session_start();
    // if (isset($_POST['submit'])) {
    //     $id = $_GET['id'];
    //     $ISBN = addslashes($_POST['ISBN']);
    //     $image = addslashes($_POST['image']);
    //     $title = addslashes($_POST['title']);
    //     $author = addslashes($_POST['author']);
    //     $editor = addslashes($_POST['editor']);
    //     $collection = addslashes($_POST['collection']);
    //     $publication_date = addslashes($_POST['publication_date']);
    //     $genre = addslashes($_POST['genre']);
    //     $id_category = addslashes($_POST['id_category']);
    //     $summary = addslashes($_POST['summary']);

    //     $reqed = "UPDATE `book` SET `ISBN`='$ISBN',`image`='$image',`title`='$title',`author`='$author',`editor`='$editor',`collection`='$collection',`publication_date`='$publication_date',`genre`='$genre',`id_category`='$id_category',`summary`='$summary' WHERE `id_book`= $id";
    //     $db->query($reqed);

    //     $_SESSION['sucess'] = "Produit éditer avec succès !";
    //     header('Location: article.php');
    //     exit();
    // }
        ?>
        </table>
        <button type="submit" name="submit" value="Post">Submit</button>
        </form>
</section> -->

<?= $article['title']?>


<?php include './header-admin.php';?>


<h1 class="multiTitre">formulaire modification de livre</h1>

    <form id="formulaire" action="#" method="POST">
        <div class="titre-auteur">

            <label for="title"></label>
            <input type="text" name="title" id="title" placeholder="TITRE">

            <label for="author"></label>
            <input type="text" name="author" id="author" placeholder="Auteur">

            <label for="ISBN"></label>
            <input type="text" name="ISBN" id="ISBN" placeholder="ISBN" >

        </div>

        <div class="edition-date">

                <label for="editor"></label>
                <input type="text" name="editor" id="editor" placeholder="Éditeur">
            
                <input class="date" type="date" name="publication_date" id="publication_date" placeholder="Éditeur">
                <label class="publication"  for="publication_date">Publication </label>
            
        </div>

        <div class="select">

            <label for="id_category">Catégorie</label>
            <select name="id_category" id="id_category">
                <option value="BD">b.d</option>
                <option value="Comics">comics</option>
                <option value="Documentaire">documentaire</option>
                <option value="Jeunesse">Jeunesse</option>
                <option value="Mangas">mangas</option>
                <option value="Poésie">poésie</option>
                <option value="Romans">romans</option>
                <option value="Théatre">théatre</option>
            </select>

            <label for="genre">Genre</label>
            <select type="text" name="genre" id="genre">
                <option value="action">action</option>
                <option value="aventure">aventure</option>
                <option value="drame">drame</option>
                <option value="fantasie">fantasie</option>
                <option value="historique">historique</option>
                <option value="horreur">horreur</option>
                <option value="policier">policier</option>
                <option value="romance">romance</option>
                <option value="science-fiction">science-fiction</option>
                <option value="thriller">thriller</option>
            </select>

            <label for="collection">Collection</label>
            <select type="text" name="collection" id="collection" placeholder="">
                <option value="collection1">collection 1</option>
                <option value="collection2">collection 2</option>
                <option value="collection3">collection 3</option>
                <option value="collection4">collection 4</option>
                <option value="collection5">collection 5</option>
            </select>

            <label for="image">Couverture</label>
            <input type="file" name="image" id="image">

        </div>

        <div class="resume">

            <label for="summary">Résumé</label>
            <textarea type="text" name="summary" id="summary"> </textarea>
            
        </div>

        <a href="#"><img src="../image/envoiFormulaireLivre.png" alt="icone du dashboard"> </a>
    </form>

    <?php include './includeClose.php'  ?>