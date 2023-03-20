<?php
include './header-admin.php';
require_once './auth.php';
$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`');
$reqCat->execute();
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submitAdd'])) {
    try {
        $addreq = $db->prepare("INSERT INTO `category` (`libel_category`, `libel_slug`) VALUES (:libel_category, :libel_slug)");
        $addreq->bindValue(":libel_category", $_POST["libel_category"], PDO::PARAM_STR);
        $addreq->bindValue(":libel_slug", $_POST["libel_slug"], PDO::PARAM_STR);
        $addreq->execute();
        $_SESSION["success"] = "votre catégorie a bien été crée";
        header('location: ./category.php');
    } catch (PDOException $e) {
        $_SESSION["error"] = "Votre catégorie n'a pas été crée";
        header('Location: ./category.php');
        exit();
    }
}
?>

<h1 class="multiTitre">liste catégories</h1>

<div id="ajoutCategorie">
    <form class="ajout" action="" method="post">

        <input class="newCat" type="text" name="libel_category" placeholder="nouvelle catégorie" required>
        <input class="slugCat" type="text" name="libel_slug" placeholder="champ du slug">
        <input class="subCat" type="submit" name="submitAdd" value="Ajouter">
    </form>
</div>






<div class="categorieList">
    <?php foreach ($resultCat as $category) { ?>
        <div class="unite">
            <h3><?= $category['libel_category'] ?> </h3>

            <a class="btnGreen" href="./categoryaddedit.php?id=<?= $category['id_category'] ?>" style="color:green">modifier</a>

            <a class="btnRed" href="" data-title="<?= $category['libel_category'] ?>" data-idbook="<?= $category['id_category'] ?>" style="color:red">supprimer</a>
        </div>
    <?php } ?>
</div>




</body>

</html>