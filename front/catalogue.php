<?php
require_once './header-front.php';
require_once './footer-front.php';

?>

<body>
    <section id="catalogue">
        <div class="catal">

            <h2 class="catalog">Catalogue</h2>

            <div class="formul-s">
                <form action="#" method="get">
                    <label for="search-book">Recherche</label>
                    <input type="text" id="search-book" name="search-book" placeholder="Recherche">
                    <button type="submit">
                </form>
                <a href="./search.php">Recherche avancée</a>

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

    </section>
</body>

</html>