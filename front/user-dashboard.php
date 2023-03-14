<!DOCTYPE html>
<html>

<head>
    <title>Tableau de bord utilisateur </title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<section class="user-dash">

<div class="container-info">
    <div class="dash-accueil">
      <h3>Mon tableau de bord Bouquine</h3>
      <h4>Bienvenue!</h4>
    </div>
  <div class="sidebar-dash">
    <ul>
      <li><a href="#">Emprunter des livres</a></li>
      <li><a href="#">Liste de mes emprunts</a></li>
      <li><a href="#">Mes informations personnelles</a></li>
      <li><a href="#">Supprimer mon compte</a></li>
      <li><a href="#">Déconnexion</a></li>
    </ul>
  </div>

     <div class="contain-perso">
      <div class="modif">
        <h2>Modifier mes informations personnelles</h2>
      </div>
      <div class="personal">
        <form action="#" method="post">
          <label for="nom">Nom:</label>
          <input type="text" id="nom" name="nom" required>

          <label for="prenom">Prénom:</label>
          <input type="text" id="prenom" name="prenom" required>

          <label for="email">Email:</label>
          <input class="mailing" type="email" id="email" name="email" required>

          <label for="motdepasse">Mot de passe:</label>
          <input type="password" id="motdepasse" name="motdepasse" required>

          <label for="confirmermotdepasse">Confirmer le mot de passe:</label>
          <input type="password" id="confirmermotdepasse" name="confirmermotdepasse" required>

          <label for="adresse">Adresse:</label>
          <input type="text" id="adresse" name="adresse">

          <input type="submit" value="Enregistrer">
        </form>
      </div>
    </div>
  </div>
</section>

</body>

</html>