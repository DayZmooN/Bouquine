<?php
require_once './auth.php';
$id = $_GET['id'];

$req = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category` WHERE `id_category` = :id');
$req->bindParam(':id', $id, PDO::PARAM_INT);
$req->execute();
$category = $req->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submitEdit'])) {
    $libelCategory = $_POST['libel_category'];
    $categorySlug = $_POST['libel_slug'];
    $reqEdit = $db->prepare("UPDATE `category` SET `libel_category`=:libel_category, `libel_slug`=:libel_slug WHERE `id_category`=:id");
    $reqEdit->bindParam(':libel_category', $libelCategory, PDO::PARAM_STR);
    $reqEdit->bindParam(':libel_slug', $categorySlug, PDO::PARAM_STR);
    $reqEdit->bindParam(':id', $id, PDO::PARAM_INT);
    $reqEdit->execute();

    $_SESSION['success'] = "Category édité avec succès !";
    header('Location: ./category.php');
    exit();
}


include './header-admin.php';
?>

<form id="formulaireAjout" action="" method="POST">
    <div id="formGauche">

        <h2 class="titleEditCategory">Modification de <?= $category['libel_category'] ?></h2>

        <div id="editCategorie">

            <form class="edit" action="" method="post">

                <input class="editCat" type="text" name="libel_category" value="<?= $category['libel_category'] ?>">
                <input class="editSlugCat" type="text" name="libel_slug" value="<?= $category['libel_slug'] ?>">

                <input class="subEditCat" type="submit" name="submitEdit" value="Modifier">

            </form>

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