<?php
require_once './auth.php';

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
while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <h1 class="multiTitre">formulaire modification de livre</h1>
    
        <form id="formulaire" action="#" method="POST" enctype="multipart/form-data">
    
            <div id="gauche">
                <div class="titre-auteur">
    
                    <label for="title"></label>
                    <input type="text" name="title" id="title" value="<?= $article['title'] ?>">
    
                    <label for="author"></label>
                    <input type="text" name="author" id="author" value="<?= $article['author'] ?>">
    
                    <label for="ISBN"></label>
                    <input type="text" name="ISBN" id="ISBN" value="<?= $article['ISBN'] ?>">
    
                </div>
    
                <div class="edition-date">
    
                    <label for="editor"></label>
                    <input type="text" name="editor" id="editor" value="<?= $article['editor'] ?>">
    
                    <label class="publication" for="publication_date">Publication</label>
                    <input class="date" type="date" name="publication_date" id="publication_date" value="<?= $article['publication_date'] ?>">
    
                    <label class="collection" for="collection"></label>
                    <input type="text" name="collection" id="collection" value="<?= $article['collection'] ?>" placeholder="Collection">
    
                    <label class="genre" for="genre"></label>
                    <input type="text" name="genre" id="genre" value="<?= $article['genre'] ?>" placeholder="genre">
    
                </div>
    
                <div class="multiSelect">
    
                    <div class="select">
                        <label for="id_category">Catégorie</label>
                        <select name="id_category" id="id_category">
                            <?php
                            $reqCat = $db->prepare("SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`");
                            $reqCat->execute();
                            while ($category = $reqCat->fetch(PDO::FETCH_ASSOC)) { 
                            ?>
                            <option value="<?= $category['id_category'] ?>" <?= $article['id_category'] == $category['id_category'] ? 'selected' : '' ?>><?= $category['libel_category'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
    
                </div>
            </div>
    
            <div id="droite">
                <div class="resume">
    
                    <label class="label1" for="summary">Résumé</label>
                    <textarea type="text" name="summary" id="summary" rows="20" cols="50"><?= $article['summary'] ?></textarea>
    
                </div>
                <input type="text" name="image" id="image" value="<?= $article['image'] ?>" placeholder="genre">
            <?php } ?>
            <input type="submit" name="submit">
            </div>
</form>