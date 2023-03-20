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
    <header>
        <nav class="header-nav">
        <div id="close-menu">X</div>
            <div class="logo">
                <a href="../front/accueil.php"><img src="../image/logo1.png" alt="logo bouquine "></a>
            </div>
            
           

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
           
        

        <?php if (isset($_SESSION['user'])) { ?>
            <a href="./user-dashboard.php" class="img-user">
                <img class="img-user" src="../image/user.png" alt="image">
                <span class="nom"><?php echo $_SESSION['user']['username']; ?></span>
            </a>
            <form action="../model/deconnexion.php" method="post">
                <button type="submit" name="logout">Déconnexion</button>
            </form>
        <?php }
        if (!isset($_SESSION['user'])) { ?>

            </a>
            <a href="./connexion.php" class="img-user">
                <input id="user-connect" type="button" value="Connexion">
            </a>
        <?php } ?>
        </ul>
        </div>
        </nav>
        <div id="burger"><img src="../image/burger.png" alt="picto menu burger"></div>
    </header>