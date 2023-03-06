<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquine</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <!-- HEADER -->
    <header class="container-fluid" header>
        <div class="container">
            <img id="logo" src="../image/logo.png" alt="Logo Bouquine">
            <nav class="menu">
                <ul>
                    <li><a href="#">Catalogue</a></li>
                    <li><a href="#">Parcourir</a></li>
                    <!-- sous menu parcourir -->
                    <ul>
                        <li><a href="#">Fantaisie</li></a>
                        <li><a href="#">Romance</li></a>
                        <li><a href="#">Action</li></a>
                        <li><a href="#">Aventure</li></a>
                        <li><a href="#">Histoire</li></a>
                        <li><a href="#">Fantastique</li></a>
                        <li><a href="#">Thriller</li></a>
                    </ul>
                    <!-- end sous menu parcourir -->
                </ul>
                <!-- barre de recherche  -->
                <li>
                    <form action="/recherche" id="rechercher" method="get">
                        <input id="search" name="searching" type="text" placeholder="Tapez votre recherche" />
                        <input id="btn-search" type="submit" value="Recherche" />
                    </form>
                    <!-- fin barre de recherche  -->
                </li>
                <li> <a href="#">Infos pratiques</a></li>
                </ul>

            </nav>
            <a href="#"><img id="connexion" src="../image/utilisateur.png" alt="icône compte utilisateur"></a>

        </div>

    </header>


    <!-- END HEADER -->
</body>

</html>