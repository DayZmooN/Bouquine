<?php
include './header-admin.php';
require_once './auth.php';
$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`');
$reqCat->execute();
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">liste catégories</h1>

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