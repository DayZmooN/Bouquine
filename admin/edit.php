<?php
require_once '../connexion.php';
session_start();
$id = $_GET['id'];
$req = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book`= $id');
$req->execute();

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
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

    $reqed = "UPDATE `book` SET `ISBN`='$ISBN',`image`='$image',`title`='$title',`author`='$author',`editor`='$editor',`collection`='$collection',`publication_date`='$publication_date',`genre`='$genre',`id_category`='$id_category',`summary`='$summary' WHERE `id_book`= $id";
    $db->query($reqed);

    $_SESSION['sucess'] = "Produit éditer avec succès !";
    header('Location: article.php');
    exit();
}
?>
<?php
while($article = $req->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <h1>Titre : <?php $article['title']?></h1>
                <?php
                } ?>