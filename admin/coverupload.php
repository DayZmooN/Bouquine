<?php
session_start();
require_once './auth.php';

    if (isset($_FILES['cover'])) {
    $id = $_GET['id'];
    $tmpname = $_FILES['cover']['tmp_name'];
    $name = $_FILES['cover']['name'];
    move_uploaded_file($tmpname, "../image/" . $name);
    $reqCover = $db->prepare("UPDATE `book` SET `image`= :image WHERE `id_book`= :id");
    $reqCover->bindParam(':id', $id, PDO::PARAM_INT);
    $reqCover->bindParam(':image', $name, PDO::PARAM_STR);
    $reqCover->execute();
    

    header('Location: ./article.php');
}

require_once './header-admin.php';
?>

<section class="new-post">
    <form action="#" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend>Ajouter une image de couverture</legend>
            <label for="cover">Image de couverture</label>
            <input type="file" name="cover" accept="image/*">
        </fieldset>
        <input type="reset" name="reset" value="Annuler">
        <input type="submit" name="submit" value="Envoyer">
    </form>
</section>