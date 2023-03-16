<?php
session_start();
require_once '../auth.php';
$id = $_GET['id'];

$req = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category` WHERE `id_category` = :id');
$req->bindParam(':id', $id, PDO::PARAM_INT);
$req->execute();
$category = $req->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
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
?>

<h1>Modification de <?= $category['libel_category'] ?></h1>
<form method="POST">
    <label for="libel_category">Libellé du category :</label>
    <input type="text" name="libel_category" id="libel_category" value="<?= $category['libel_category'] ?>">

    <label for="libel_slug">Slug :</label>
    <input type="text" name="libel_slug" id="libel_slug" value="<?= $category['libel_slug'] ?>">

    <button type="submit" name="submit">Enregistrer</button>
</form>