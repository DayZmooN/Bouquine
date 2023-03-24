<?php
session_start();
require_once './connect.php'
?>

<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fontawesome.com/">

</head>

<body>
    <!-- HEADER -->
    <header id="head">
        <nav class="header-nav">
            <!-- <div id="menu-icon">
                <a href="#"><img src="../image/burger.png" alt="menu burger"></a>

            </div>
            <div id="close-menu">X</div> -->
            <div class="logo">
                <a href="../front/accueil.php"><img src="../image/logo1.png" alt="logo bouquine "></a>
            </div>

            <ul class="menu">
                <li><a href="./catalogue.php">Catalogue</a></li>
                <li>
                    <a href="#">Catégorie</a>
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
                        <button id="search-button1" type="submit">Rechercher</button>
                    </form>
                </li>
            </ul>

            <div class="header-btn">
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href="./user-dashboard.php" class="img-user">
                        <img class="img-user1" src="../image/user.png" alt="image user">
                        <span class="nom"><?php echo $_SESSION['user']['username']; ?></span></a>

                    <form id="deconnect" action="../model/deconnexion.php" method="post">
                        <button id="user-deconnect" type="submit" name="logout"><img id="deconnect1" src="../image/deconnexion-.png" alt="déconnexion"></button>
                    </form>
                <?php }
                if (!isset($_SESSION['user'])) { ?>


                    <a href="./connexion.php" class="btn-user">
                        <button id="user-connect" type="submit">Connexion</button>
                    </a>
                <?php } ?>
            </div>
        </nav>

    </header>