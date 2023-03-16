<!DOCTYPE html>
<html>

<head>
  <title>Tableau de bord utilisateur </title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Dashboard d'emprunt de livres</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <div class="navbar">
      <a href="#">Mes emprunts</a>
      <a href="#">Modifier mes informations</a>
      <a href="#">Supprimer mon compte</a>
      <a href="#">Déconnexion</a>
    </div>
    <div class="content">
      <h2>Tableau de bord</h2>
      <div class="userinfo">
        <h3>Informations personnelles</h3>
        <!-- <p>Nom : Najia Ligali</p> -->
        <div class="form-col">
          <form>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-col">
          <label for="prenom">Prénom:</label>
          <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-col">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-col">
          <label for="telephone">Téléphone:</label>
          <input type="text" id="telephone" name="telephone">
        </div>
        <div class="form-col">
          <label for="adresse">Adresse:</label>
          <input type="text" id="adresse" name="adresse">
        </div>

        <div class="form-row">
          <input type="submit" value="Enregistrer">
        </div>
        </form>

      </div>
    </div>
  </body>

  </html>

  <!-- <h2 class="dashb">Tableau de bord</h2>
    
    <nav id="user-nav">
      <ul>
        <li><a href="#">Emprunter un livre</a></li>
        <li><a href="#">Mes emprunts</a></li>
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
    </div> -->
  <section class="user-dash">
    <div class="dash-user">

      <div class="dash-accueil">
        <h3>Mon tableau de bord Bouquine</h3>
        <h4>Bienvenue!</h4>

        <div class="sidebar-dash">
          <ul>
            <li><a href="#">Emprunter des livres</a></li>
            <li><a href="#">Liste de mes emprunts</a></li>
            <li><a href="#">Mes informations personnelles</a></li>
            <li><a href="#">Supprimer mon compte</a></li>
            <li><a href="#">Déconnexion</a></li>
          </ul>
        </div>

      </div>
  </section>
</body>

</html>