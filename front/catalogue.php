<?php
require_once './header-front.php';
require_once './footer-front.php';

?>

<body>
    <section id="catalogue">
        <div class="catal">

            <h2 class="catalog">Catalogue</h2>

            <div class="formul-s">
                <form class="rechercher" action="#" method="get">
                    <input type="text" name="search" placeholder="Rechercher">
                    <a href="../front/search.php"><img src="../image/filtre.png" alt="recherche avancée"></a>
                </form>
            </div>
           
            <button id="searc-bar" type="submit" name="submit"><a href="#">Rechercher</button></a>
           
            <div class="books">
                <div class="container-books">
                    <div class="books-catalog">
                        <div class="item4">
                            <a href="#"><img src="../image/aime moi.jpg" alt="aime moi"></a>
                            <p class="titles">Aime moi</p>
                            <p class="authors">Edward Norton</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
</body>

</html>