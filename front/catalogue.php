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

                    <!-- <div class="recherch-bar"> -->
                        <button id="searc-bar" type="submit" name="submit"><a href="#">Rechercher</button></a>
                    <!-- </div> -->
                    <!-- <label for="search-book">Recherche</label>
                    <input type="text"  name="search-book" placeholder="Recherche">
                    <a href="#"><img class="loupe" src="../image/loupe.svg" alt="loupe recherche"></a> -->

                </form>

            </div>
            <div class="catalog-bar">
                <a href="../front/search.php"><input type="submit" value="Recherche avancée"></a>
            </div>
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