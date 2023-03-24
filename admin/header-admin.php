<?php
session_start();
require_once './auth.php';
if (!isset($_SESSION["admin"])) {
    header("location: ./connexion-admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style-admin.css">
    <!-- <link rel="stylesheet" href="./JS/error.css"> -->
</head>

<body>
    <aside id="side-bar">
        <div id="logo">
            <img src="../image/logoAdmin.png" alt="logo du site bouquine">
        </div>
        <div id="menu-admin">
            <nav>
                <ul>
                    <li><img src="../image/tableauDeBord.png" alt="icone du dashboard"> <a href="./dashboard-admin.php">Tableau de bord</a>
                    </li>
                    <li><img src="../image/articleDashboard.png" alt="icone articles du dashboard"><a href="./article.php">Articles</a></li>
                    <li><img src="../image/catégorieDashboard.png" alt="icone catégorie du dashboard"><a href="./category.php">Catégories</a></li>
                    <li><img src="../image/genresDashboard.png" alt="icone genres du dashboard"><a href="./genre.php">Genre</a></li>
                    <li><img src="../image/userDashboard.png" alt="icone user du dashboard"><a href="./user.php">Users</a></li>
                    <li><img src="../image/newsLetterDashboard.png" alt="icone newsletter du dashboard"><a href="../admin/newsletter.php">Newsletter</a></li>

                </ul>
            </nav>
        </div>
    </aside>

    <div class="corp">
        <header id="headerDashboard">
            <img class="notif" src="../image/adminDashboard.png" alt="icone administrateur">
            <p><?php echo $_SESSION['admin']['username']; ?></p>
            <a class="notif" href="#"> <img src="../image/boutonNotificationDashboard.png" alt="bouton cloche de notifications" title="voir vos notifications"></a>
            <a class="notif" href="./deconnexion-admin.php"> <img src="../image/deconnexionDashboard.png" alt="bouton de deconnexion" title="vous deconnectez"></a>
        </header>

        <main class="multitaches">
</body>

<script src="./js/admin.js"></script>