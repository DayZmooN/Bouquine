<?php
require_once '../connexion.php';
include './header-admin.php';
?>


<h1 class="multiTitre">modifications catégories</h1>

<div id="ajout-categorie">
     <form action="" method="post">
          <div class="ajout">
               <input class="recherche" type="search" name="recherche" placeholder="nouvelle catégorie">
               <button><a href="./add.php">ajouter</a></button>
          </div>

          <div class="modifierSupp">
               <select name="id_category" id="id_category">
                    <option value="">selectionner</option>
                    <option value="BD">b.d</option>
                    <option value="Comics">comics</option>
                    <option value="Documentaire">documentaire</option>
                    <option value="Jeunesse">Jeunesse</option>
                    <option value="Mangas">mangas</option>
                    <option value="Poésie">poésie</option>
                    <option value="Romans">romans</option>
                    <option value="Théatre">théatre</option>
               </select>

               <input class="recherche" type="search" name="recherche" placeholder="nouveau nom">
               <button><a href="./add.php">modifier</a></button>
               <button><a href="./add.php">supprimer</a></button>
          </div>
     </form>

</div>

<?php include './includeClose.php'  ?>