<?php
//on démarre une session PHP on ecrit a chaquer page ou veut rester connecter en debut 
session_start();
if (!isset($_SESSION["user"])) {
    header("location: ./connexion.php");
    exit;
}
// on inclut le header 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquine</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="dash-user">
        <div class="dashboard-container">
            <h2>Mon tableau de bord </h2>
            <div class="info-user">
                <img class="user1" src="../image/user1.png" alt="icône user">
                <div class="details">
                    <h3><?= $_SESSION["user"]["username"] ?></h3>
                    <p>Lastname :<?= $_SESSION["user"]["lastname"] ?></p>
                    <p>Email :<?= $_SESSION["user"]["mail"] ?></p>
                    <p>Téléphone : <?= $_SESSION["user"]["phone"] ?></p>
                    <p>birthday : <?= $_SESSION["user"]["birthdate"] ?></p>
                </div>
            </div>
            <div class="actions">
                <a href="#">Emprunter un livre</a>
                <a href="#">Voir la liste de mes emprunts</a>
                <a href="#">Modifier mes informations personnelles</a>
                <a href="#">Supprimer mon compte</a>
                <a href="./deconnexion.php">Déconnexion</a>
            </div>
        </div>
    </section>
</body>

</html>