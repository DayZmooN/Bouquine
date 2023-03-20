<?php
require_once './header-front.php';
?>
<!DOCTYPE html>
<html>

<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tableau de bord utilisateur </title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>

  <div class="dashboard1">
    <h2>Bienvenue sur votre espace personnel </h2>
  </div>
  <nav id="user-nav">
    <ul>
      
      <li><a href="#">Modifier mes informations personnelles</a></li>
      <li><a href="#">Emprunter un livre</a></li>
      <li><a href="#">Supprimer mon compte</a></li>
      <li><a href="#">Déconnexion</a></li>
    </ul>
  </nav>
  <div class="info1">
    <h3 class="info-perso">Information personnelle </h3>
    <form id="dash-form" action="#" method="post">
      <div class="names">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>
        &nbsp; &nbsp; &nbsp; 
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required>
      </div>

      <label for="email">Email</label>
      <input type="email" id="email1" name="email" required>

      <label for="telephone">Téléphone </label>
      <input type="tel" id="telephone" name="telephone" required>

      <label  id="lab-adress" for="adresse">Adresse</label>
      <input class="adress" type="text" id="adresse" name="adresse">

      <input type="submit" value="Enregistrer">

  </div>

  </form>

</body>


</html>