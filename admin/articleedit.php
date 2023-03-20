<?php
require_once '../connexion.php';

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $ISBN = ($_POST['ISBN']);
    $image = ($_POST['image']);
    $title = ($_POST['title']);
    $author = ($_POST['author']);
    $editor = ($_POST['editor']);
    $collection = ($_POST['collection']);
    $publication_date = ($_POST['publication_date']);
    $genre = ($_POST['genre']);
    $id_category = ($_POST['id_category']);
    $summary = ($_POST['summary']);

    $reqed = $db->prepare("UPDATE `book` SET `ISBN`= :ISBN,`image`= :image,`title`= :title,`author`= :author,`editor`= :editor,`collection`= :collection,`publication_date`= :publication_date,`genre`= :genre,`id_category`= :id_category,`summary`= :summary WHERE `id_book`= :id");
    $reqed->bindParam('ISBN', $ISBN, PDO::PARAM_STR);
    $reqed->bindParam('image', $image, PDO::PARAM_STR);
    $reqed->bindParam('title', $title, PDO::PARAM_STR);
    $reqed->bindParam('author', $author, PDO::PARAM_STR);
    $reqed->bindParam('editor', $editor, PDO::PARAM_STR);
    $reqed->bindParam('collection', $collection, PDO::PARAM_STR);
    $reqed->bindParam('publication_date', $publication_date, PDO::PARAM_STR);
    $reqed->bindParam('genre', $genre, PDO::PARAM_STR);
    $reqed->bindParam('id_category', $id_category, PDO::PARAM_INT);
    $reqed->bindParam('summary', $summary, PDO::PARAM_STR);
    $reqed->bindParam('id', $id, PDO::PARAM_INT);
    $reqed->execute();

    $_SESSION['sucess'] = "Produit éditer avec succès !";
    header('Location: article.php');
    exit();
}

include './header-admin.php';

$id = $_GET['id'];
$req = $db->prepare("SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id");
$req->bindParam('id', $id, PDO::PARAM_INT);
$req->execute();

while ($article = $req->fetch(PDO::FETCH_ASSOC))
?>
<h1 class="multiTitre">formulaire modification de livre</h1>




<form id="formulaire" action="#" method="POST" enctype="multipart/form-data">

    <div id="gauche">
        <div class="titre-auteur">

            <label for="title"></label>
            <input type="text" name="title" id="title" value="#">

            <label for="author"></label>
            <input type="text" name="author" id="author" value="#">

            <label for="ISBN"></label>
            <input type="text" name="ISBN" id="ISBN" value="#">

        </div>

        <div class="edition-date">

            <label for="editor"></label>
            <input type="text" name="editor" id="editor" value="#">

            <label class="publication" for="publication_date">Publication</label>
            <input class="date" type="date" name="publication_date" id="publication_date" value="#">

            <label class="collection" for="collection"></label>
            <input type="text" name="collection" id="collection" value="#" placeholder="Collection">

            <label class="id_category" for="id_category"></label>
            <input type="text" name="id_category" id="id_category" value="#" placeholder="id_category">

            <label class="genre" for="genre"></label>
            <input type="text" name="genre" id="genre" value="#" placeholder="genre">

        </div>

        <div class="multiSelect">

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
            </div>

            <div class="select">
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
            </div>

            <div class="select">
                <label for="collection">Collection</label>
                <select type="text" name="collection" id="collection" placeholder="">
                    <option value="collection1">collection 1</option>
                    <option value="collection2">collection 2</option>
                    <option value="collection3">collection 3</option>
                    <option value="collection4">collection 4</option>
                    <option value="collection5">collection 5</option>
                </select>
            </div>
        </div>
    </div>

    <div id="droite">
        <div class="resume">

            <label class="label1" for="summary">Résumé</label>
            <textarea type="text" name="summary" id="summary" rows="20" cols="50"> </textarea>

            <label class="label2" for="image">Couverture</label>
            <input class="choixImg" type="file" name="image" id="image">

        </div>

        <a href="#"><img src="../image/envoiFormulaireLivre.png" alt="icone du dashboard" title="ajouter un nouveau livre"> </a>
    </div>
</form>