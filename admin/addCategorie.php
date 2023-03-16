<?php
require_once '../connexion.php';
include './header-admin.php';
?>


<h1 class="multiTitre">modifications catégories</h1>

<div id="ajout-categorie">
    <form class="ajout" action="" method="post">

        <input class="newCat" type="text" name="category" placeholder="nom catégorie">
        <input class="newCat" type="text" name="category" placeholder="slug catégorie">
        <input type="submit" value="Ajouter">

    </form>

    <form class="edit" action="" method="post">
        <div id="selection">
        <input class="editCat" type="text" name="category" value="nom catégorie">
        <input class="editCat" type="text" name="category" value="slug catégorie">
        </div>

        <div id="choice">
            <input type="submit" value="Modifier">
        </div>

    </form>

</div>

<?php include './includeClose.php'  ?>