<?php
require_once '../connexion.php';
session_start();
$id = $_GET['id'];
?>

<section>
    <?php
    $req = $db->prepare("SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id");
    $req->bindParam('id', $id, PDO::PARAM_INT);
    $req->execute();

    while ($article = $req->fetch(PDO::FETCH_ASSOC)) {
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
            </tbody>
        <?php }
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

        $reqed = $db->prepare("UPDATE `book` SET `ISBN`=':ISBN',`image`=':image',`title`=':title',`author`=':author',`editor`=':editor',`collection`=':collection',`publication_date`=':publication_date',`genre`=':genre',`id_category`=':id_category',`summary`=':summary' WHERE `id_book`= :id");
        $addreq->bindParam('id', $id, PDO::PARAM_INT);
        $addreq->bindParam('ISBN',$ISBN, PDO::PARAM_STR);
        $addreq->bindParam('image',$image, PDO::PARAM_STR);
        $addreq->bindParam('title',$title, PDO::PARAM_STR);
        $addreq->bindParam('author',$author, PDO::PARAM_STR);
        $addreq->bindParam('editor',$editor, PDO::PARAM_STR);
        $addreq->bindParam('collection',$collection, PDO::PARAM_STR);
        $addreq->bindParam('publication_date',$publication_date, PDO::PARAM_STR);
        $addreq->bindParam('genre',$genre, PDO::PARAM_STR);
        $addreq->bindParam('id_category',$id_category, PDO::PARAM_INT);
        $addreq->bindParam('summary',$summary, PDO::PARAM_STR);
        $reqed->execute();

        $_SESSION['sucess'] = "Produit modifier avec succès !";
        header('Location: article.php');
        exit();
    }
        ?>
        </table>
        <button type="submit" name="submit" value="Post">Submit</button>
        </form>
</section>