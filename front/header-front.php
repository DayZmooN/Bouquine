<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquine</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fontawesome.com/">

</head>

<body>
    <!-- HEADER -->
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
                        <li><a href='#'>Action</a></li>
                        <li><a href='#'>Romance</a></li>
                        <li><a href='#'>Fantaisie</a></li>
                        <li><a href='#'>Thriller</a></li>
                        <li><a href='#'>Aventure</a></li>
                    </ul>
                </li>
                <li><a href='../front/infopratique.php'>Infos pratiques</a></li>
                <!-- barre de recherche  -->
                <li class="search-box">
                    <input type="text" name="search" placeholder="Rechercher">
                </li>
            </ul>
        </nav>
        <div class="search-bar">
            <button id="s-bar" type="submit" name="submit"><a href="#">Rechercher</button></a>
        </div>
        <div class="user-name">
        <a href="./connexion.php"><img class="img-user" src="../image/user.png" alt="connexion au compte "></a>
        <span class="nom">User</span>
        </div>
    </header>

</body>

</html>