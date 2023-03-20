<?php
require_once '../connexion.php';

if (isset($_POST['submitAdd'])) {
    try {
        $addreq = $db->prepare("INSERT INTO `category` (`libel_category`, `libel_slug`) VALUES (:libel_category, :libel_slug)");
        $addreq->bindValue(":libel_category", $_POST["libel_category"], PDO::PARAM_STR);
        $addreq->bindValue(":libel_slug", $_POST["libel_slug"], PDO::PARAM_STR);
        $addreq->execute();
        $_SESSION["success"] = "votre genre a bien été crée";
        header('location: ./category.php');
    } catch (PDOException $e) {
        $_SESSION["error"] = "Votre Genre n'a pas été crée";
        header('Location: ./category.php');
        exit();
    }
}

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


<h1 class="multiTitre">edit catégories</h1>

<h2 class="titleEditCategory">Modification de <?= $category['libel_category'] ?></h2>

<div id="editCategorie">

    <form class="edit" action="" method="post">


        <input class="editCat" type="text" name="libel_category" value="<?= $category['libel_category'] ?>">
        <input class="editSlugCat" type="text" name="libel_slug" value="<?= $category['libel_slug'] ?>">

        <input class="subEditCat" type="submit" name="submitEdit" value="Modifier">


    </form>

</div>

<?php include './includeClose.php'  ?>