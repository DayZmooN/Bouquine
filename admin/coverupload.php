<?php
session_start();
require_once './auth.php';

    if (isset($_FILES['cover'])) {
    $id = $_GET['id'];
    $tmp_name = $_FILES['cover']['tmp_name'];
    $name = $_FILES['cover']['name'];
    $image = $name;

    $manga = $db->prepare("UPDATE `book` SET `image`= :image WHERE `id_book`= :id");
    $manga->bindParam(':id', $id, PDO::PARAM_INT);
    $manga->bindParam(':image', $image, PDO::PARAM_STR);
    $manga->execute();
    move_uploaded_file($tmpName, '../image' . $name);

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