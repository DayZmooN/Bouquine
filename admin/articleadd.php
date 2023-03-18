<?php
require_once './auth.php';

if (isset($_POST['submit'])) {
    try {
        $addreq = $db->prepare("INSERT INTO `book`(`ISBN`,`image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`) VALUES (:ISBN, :image, :title, :author, :editor, :collection, :publication_date, :genre, :id_category, :summary)");
        $addreq->bindParam('ISBN', $_POST["ISBN"], PDO::PARAM_STR);
        $addreq->bindParam('image', $_POST["image"], PDO::PARAM_STR);
        $addreq->bindParam('title', $_POST["title"], PDO::PARAM_STR);
        $addreq->bindParam('author', $_POST["author"], PDO::PARAM_STR);
        $addreq->bindParam('editor', $_POST["editor"], PDO::PARAM_STR);
        $addreq->bindParam('collection', $_POST["collection"], PDO::PARAM_STR);
        $addreq->bindParam('publication_date', $_POST["publication_date"], PDO::PARAM_STR);
        $addreq->bindParam('genre', $_POST["genre"], PDO::PARAM_STR);
        $addreq->bindParam('id_category', $_POST["id_category"], PDO::PARAM_INT);
        $addreq->bindParam('summary', $_POST["summary"], PDO::PARAM_STR);
        $addreq->execute();

        $_SESSION["success"] = "Votre livre a bien été crée";
        header('location: ./article.php');
    } catch (PDOException $e) {
        $_SESSION["error"] = "Votre livre n'a pas été crée";
        header('Location: ./article.php');
        exit();
    }
}

include './header-admin.php';
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
                <label for="collection"></label>
                <input type="text" name="collection" id="collection" placeholder="collection">
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
                <?php
                $reqCat = $db->prepare("SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`");
                $reqCat->execute();
                while ($category = $reqCat->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <option value="<?= $category['id_category'] ?>"><?= $category['libel_category'] ?></option>
                <?php } ?>

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
            <input type="text" name="image" id="image">
        </div>
        <div id="defiBouton">
            <img src="../image/envoiFormulaireLivre.png" class="aiecone" alt="icone de bouton d'envois vert">
            <input type="submit" name="submit" value="Ajouter">
        </div>
    </div>
</form>