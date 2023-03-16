<?php
require_once '../connexion.php';
include './header-admin.php';
session_start();

if (isset($_POST['submit'])) {
    $ISBN = addslashes($_POST['ISBN']);
    $image = addslashes($_POST['image']);
    $title = addslashes($_POST['title']);
    $author = addslashes($_POST['author']);
    $editor = addslashes($_POST['editor']);
    $collection = addslashes($_POST['collection']);
    $publication_date = addslashes($_POST['publication_date']);
    $genre = addslashes($_POST['genre']);
    $id_category = addslashes($_POST['id_category']);
    $summary = addslashes($_POST['summary']);

    $addreq = $db->prepare("INSERT INTO `book`(`ISBN`,`image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`) VALUES (':ISBN',':image',':title',':author',':editor',':collection',':publication_date',':genre',':id_category',':summary')");
    $addreq->bindParam('ISBN', $ISBN, PDO::PARAM_STR);
    $addreq->bindParam('image', $image, PDO::PARAM_STR);
    $addreq->bindParam('title', $title, PDO::PARAM_STR);
    $addreq->bindParam('author', $author, PDO::PARAM_STR);
    $addreq->bindParam('editor', $editor, PDO::PARAM_STR);
    $addreq->bindParam('collection', $collection, PDO::PARAM_STR);
    $addreq->bindParam('publication_date', $publication_date, PDO::PARAM_STR);
    $addreq->bindParam('genre', $genre, PDO::PARAM_STR);
    $addreq->bindParam('id_category', $id_category, PDO::PARAM_INT);
    $addreq->bindParam('summary', $summary, PDO::PARAM_STR);
    $addreq->execute();

    $_SESSION['sucess'] = "Produit ajouté avec succès !";
    header('Location: article.php');
    exit();
}
?>
<h1 class="multiTitre">formulaire ajout de livre</h1>

<form id="formulaireAjout" action="#" method="POST">

    <div id="formGauche">
        <div class="titre-auteur">

            <label for="title"></label>
            <input class="tripleInput" type="text" name="title" id="title" placeholder="TITRE">


            <label for="author"></label>
            <input class="tripleInput" type="text" name="author" id="author" placeholder="Auteur">


            <label for="ISBN"></label>
            <input class="tripleInput" type="text" name="ISBN" id="ISBN" placeholder="ISBN">

        </div>

        <div class="edition-date">
            <div>
                <label for="editor"></label>
                <input type="text" name="editor" id="editor" placeholder="Éditeur">
            </div>

            <div>
                <label class="publication" for="publication_date">Publication : </label>
                <input class="date" type="date" name="publication_date" id="publication_date">
            </div>
        </div>


    </div>

    <div class="milieu">

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


        <div id="genreChoice">

            <label for="genre"></label>
            <input type="text" name="genre" id="genre" placeholder="indiquez le genre">
        </div>




    </div>

    <div id="droite">
        <div class="resume">

            <label for="summary">Résumé</label>
            <textarea type="text" name="summary" id="summary"></textarea>

        </div>

        <div id="imageChoice">
            <label for="image">image</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit" name="submit" id="submit"><img src="../image/envoiFormulaireLivre.png" alt="icone du dashboard"> </button>
    </div>
    
</form>

<?php include './includeClose.php'  ?>