<?php
require_once './header-front.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tableau de bord utilisateur </title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<h4 class="dashb">Tableau de bord</h4>
    
    <nav id="user-nav">
    <ul>
      <li><a href="#">Emprunter un livre</a></li>
      
      <li><a href="#">Modifier mes informations personnelles</a></li>
      <li><a href="#">Supprimer mon compte</a></li>
      <li><a href="#">Déconnexion</a></li>
    </ul>
  </nav>
  <div class="info1">
    
    <div class="personal">
    <h3>Informations personnelles</h3>
  <form action="#" method="post">
    <div class="form-row">
      <div class="form-col">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
      </div>

      <div class="form-col">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-col">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-col">
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse">
      </div>
    </div>

    <div class="form-row">
      <input type="submit" value="Enregistrer">
    </div>
  </form>
</div>

        </form>
      </div>
  </div>
 
</body>


</html>