<?php
include './header-admin.php';
require_once './auth.php';
$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`');
$reqCat->execute();
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">liste catégories</h1>

<div id="ajoutCategorie">
    <form class="ajout" action="" method="post">

        <input class="newCat" type="text" name="libel_category" placeholder="nouvelle catégorie">
        <input class="slugCat" type="text" name="libel_slug" placeholder="champ du slug">
        <input class="subCat" type="submit" name="submitAdd" value="Ajouter">

    </form>
</div>






<div class="categorieList">
<?php foreach($resultCat as $category){ ?>
    <div class="unite">
    <h3><?= $category['libel_category'] ?> </h3>

    <a class="btnGreen" href="./categoryaddedit.php?id=<?= $category['id_category'] ?>" style="color:green">modifier</a>

    <a class="btnRed" href="./deletecategory.php?id=<?= $category['id_category'] ?>" style="color:red">supprimer</a>
    </div>
<?php } ?>
</div>


<? include './includeClose.php'  ?>