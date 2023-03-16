<?php
session_start();
include './header-admin.php';
?>
<h1 class="multiTitre">modifications genres</h1>

<div id="ajout-genre">
    <form class="ajout" action="" method="post">

        <input class="newGenre" type="text" name="genre" placeholder="libel genre">
        <input class="newGenre" type="text" name="genre" placeholder="genre slug">
        <input type="submit" value="Ajouter">

    </form>

    <form class="edit" action="" method="post">
        <div id="selection">
        <input class="editGenre" type="text" name="genre" placeholder="libel genre">
        <input class="editGenre" type="text" name="genre" placeholder="genre slug">
        </div>

        <div id="choice">
            <input type="submit" value="Modifier">
        </div>

    </form>

</div>

<?php include './includeClose.php'  ?>