<?php
require_once './back-office/connexion-admin/connexion-admin.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="../css/style-admin.css">


</head>

<body>

    <aside id="sideVide">
        <div id="logo">
            <img src="../image/logoAdmin.png" alt="logo Bouquine">
        </div>
    </aside>

    <div class="bodyConnexion">
        <form class="connexion" method="post">
            <?php if (isset($_GET['erro'])) { ?>
                <p style="color:red; text-align:center;">Adresse e-mail ou mot de passe incorrect</p>
            <?php } ?>
            <h1 class="Titre">Connexion</h1>
            <div id="mail">
                <label for="mail"></label>
                <input type="email" name="mail" id="mail" placeholder="entrez votre mail ou nom d'utilisateur">
            </div>
            <div id="pass">
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="entrez votre mot de passe">
            </div>
            <div id="connect">
                <button type="submit"><a href="./back-office/connexion-admin/connexion-admin.php"></a>Connect</button>
            </div>
        </form>
    </div>
</body>

</html>