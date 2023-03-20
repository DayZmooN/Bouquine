<?php
session_start();
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




<form id="formulaireModif" action="#" method="POST">

<div id="formGauche">
    <div class="titre-auteur">

        <label for="title"></label>
        <input class="tripleInput" type="text" name="title" id="title" placeholder="le seigneur des anneau la communauté de l'anneau">


        <label for="author"></label>
        <input class="tripleInput" type="text" name="author" id="author" placeholder="J.R.R Tolkien">


        <label for="ISBN"></label>
        <input class="tripleInput" type="text" name="ISBN" id="ISBN" placeholder="9-788175-257665">

    </div>

    <div class="edition-date">
        <div class="editeur">
            <label for="editor"></label>
            <input type="text" name="editor" id="editor" placeholder="Christian Bourgois">
        </div>

        <div class="ajoutDate">
            <label class="publication" for="publication_date">Publication : </label>
            <input class="date" type="date" name="publication_date" id="publication_date" placeholder="Christian 1954-01-01">
        </div>

    </div>
</div>
    
<div class="formMilieu">

    <div class="select">

        <label for="id_category">Catégorie</label>

        <select name="id_category" id="id_category">
            <?php
            $reqCat = $db->prepare("SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`");
            $reqCat->execute();
            while ($category = $reqCat->fetch(PDO::FETCH_ASSOC)) {
            ?>
        <option name="<?= $category['id_category'] ?>" value="<?= $category['id_category'] ?>"><?= $category['libel_category'] ?></option>
    <?php } ?>
        </select>

    </div>


    <div class="genreChoice">

        <label for="genre"></label>
        <input type="text" name="genre" id="genre" placeholder="Fantastique">
    </div>

    <div class="resume">

        <label for="summary">Résumé</label>
        <textarea type="text" name="summary" id="summary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat libero delectus fugiat numquam est iusto impedit provident error ad minima similique corporis, dignissimos quis obcaecati? Neque repellat illum nemo eius?</textarea>

    </div>

</div>

<div class="formDroite">
    
    <div class="imageChoice">
        <label for="image">image</label>
        <input type="text" name="image" id="image" placeholder="image.png">
    </div>

    
    <input type="submit" name="submit" value="Envoyer le formulaire">
</div>

</form>

<?php include './includeClose.php'  ?>