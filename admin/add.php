<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <?php
    require_once '../connexion.php';

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

        $addreq = "INSERT INTO `book`(`ISBN`,`image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`) VALUES ('$ISBN','$image','$title','$author','$editor','$collection','$publication_date','$genre','$id_category','$summary')";
        $db->query($addreq);

        $_SESSION['sucess'] = "Produit ajouté avec succès !";
        header('Location: article.php');
        exit();
    }
    ?>
    <form action="#" method="POST">
        <label for="ISBN">ISBN</label>
        <input type="text" name="ISBN" id="ISBN">
        <br>
        <label for="image">Cover</label>
        <input type="text" name="image" id="image">
        <br>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="author">Auteur</label>
        <input type="text" name="author" id="author">
        <br>
        <label for="editor">Éditeur</label>
        <input type="text" name="editor" id="editor">
        <br>
        <label for="collection">Collection</label>
        <input type="text" name="collection" id="collection">
        <br>
        <label for="publication_date">Date <br>publication :</label>
        <input type="date" name="publication_date" id="publication_date">
        <br>
        <label for="genre">Genre</label>
        <input type="text" name="genre" id="genre">
        <br>
        <label for="id_category">Catégorie</label>
        <input type="number" name="id_category" id="id_category">
        <br>
        <label for="summary">Résumé</label>
        <input type="text" name="summary" id="summary">
        <br>
        <button type="submit" name="submit" value="Post">Submit</button>
    </form>
</body>

</html>