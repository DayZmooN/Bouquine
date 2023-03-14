<?php
include './header-admin.php';
require_once './auth.php';
$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`');
$reqCat->execute();
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="multiTitre">menu catégories</h1>

<aside class="categorieList">

    <h2>liste des catégories</h2>

    <ol>
        <?php
        foreach ($resultCat as $category) {
        ?>
            <li><?= $category['libel_category'] ?></li>
        <?php
        }
        ?>
    </ol>

    <button><a href="./addCategorie.php">modifier / supprimer</a></button>

</aside>














<?php include './includeClose.php'  ?>