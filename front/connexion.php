<?php
//on démarre une session PHP
require_once '../model/connexion.php';
require_once './connect.php';




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquine</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">

</head>

<body>
    <section id="connexion">
        <div class="lettreb">

            <a href="./accueil.php"><img class="b" src="../image/logo1.png" alt="logo bouquine"></a>

        </div>
        <h2 class="connect">Se connecter</h2>

        <div class="social-media">
            <p><a href="https://www.google.com/intl/fr/gmail/about/"><i class='fab fa-google' style='font-size:24px'></i></p></a>
            <p><a href="https://fr-fr.facebook.com/"><i class="fab fa-facebook-f" style='font-size:24px'></i></p></a>
            <p><a href="https://twitter.com/?lang=fr"><i class="fab fa-twitter" style='font-size:24px'></i></p></a>

        </div>

        <p class="email">ou utiliser mon adresse e-mail :</p>

        <form id="inscription" method="POST">
            <?php if (isset($_GET['err'])) { ?>
                <p style="color:red; text-align:center;">Adresse e-mail ou mot de passe incorrect</p>
            <?php } ?>
            <div class="inputs">
                <input type="email" id="mail" name="mail" placeholder="Email" required />
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
            </div>

            <p class="inscription"><a href="#">J'ai oublié mon mot de passe</a><br>
                Je n'ai pas de compte.<a href="./inscription.php"> S'inscrire</a></p>

            <button id="btn-connect" type="submit">Se connecter</button>
            </div>
        </form>
    </section>

    <script src="../js/main.js"></script>
</body>

</html>