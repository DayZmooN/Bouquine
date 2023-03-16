<?php
session_start();
include './header-admin.php';
?>
<h1 class="multiTitre">modifications genres</h1>

<div id="ajout-genre">
    <form class="ajout" action="" method="post">

        <input class="newGenre" type="text" name="recherche" placeholder="libel genre">
        <input class="newGenre" type="text" name="recherche" placeholder="genre slug">
        <button><a href="./add.php">ajouter</a></button>

    </form>

    <form class="modifierSupp" action="" method="post">
        <div id="selection">
                <select type="text" name="genre" id="genre">
                    <option value="">selectionner</option>
                    <option value="action">action</option>
                    <option value="aventure">aventure</option>
                    <option value="drame">drame</option>
                    <option value="fantasie">fantasie</option>
                    <option value="historique">historique</option>
                    <option value="horreur">horreur</option>
                    <option value="policier">policier</option>
                    <option value="romance">romance</option>
                    <option value="science-fiction">science-fiction</option>
                    <option value="thriller">thriller</option>
                </select>
            
            <input class="modifGenre" type="search" name="recherche" placeholder="nouveau nom">
        </div>

        <div id="choice">
            <button><a href="./add.php">modifier</a></button>
            <button><a href="./add.php">supprimer</a></button>
        </div>

    </form>

</div>

<?php include './includeClose.php'  ?>