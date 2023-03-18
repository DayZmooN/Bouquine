<?php
session_start();
require_once './connect.php'
?>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<header>
    <nav class="header-nav">
        <div class="logo">
            <a href="../front/accueil.php"><img src="../image/logo1.png" alt="logo bouquine "></a>
        </div>
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon"></label>
        <ul class="menu">
            <li><a href="./catalogue.php">Catalogue</a></li>
            <li>
                <a href="#">Parcourir</a>
                <ul>
                    <?php
                    include '../connexion.php';
                    $sql = "SELECT `category`.`id_category`,`libel_category` FROM category;";
                    $req = $db->query($sql);
                    $req->execute();
                    while ($category = $req->fetch(PDO::FETCH_ASSOC)) { ?>
                        <li><a href='./parcourir.php?id=<?= $category['id_category'] ?>'><?= $category['libel_category'] ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href='../front/infopratique.php'>Infos pratiques</a></li>
            <!-- barre de recherche  -->
            <li class="search-box">
                <form id="form-header" method="GET" action="./recherche.php">
                    <input type="search" name="search" placeholder="Rechercher">
                    <button id="search-button" type="submit">Rechercher</button>
                </form>
            </li>
        </ul>
    </nav>

    <?php if (isset($_SESSION['user'])) { ?>
        <a href="./user-dashboard.php" class="img-user">
            <img class="img-user" src="../image/user.png" alt="image">
            <span class="nom"><?php echo $_SESSION['user']['username']; ?></span>

        </a>
        <form action="../model/deconnexion.php" method="post">
            <button id="search-button" type="submit" name="logout">Déconnexion</button>
        </form>
    <?php }
    if (!isset($_SESSION['user'])) { ?>

        </a>
        <a href="./connexion.php" class="img-user">
            <span class="nom">Se connecter</span>
        </a>
    <?php } ?>
</header>