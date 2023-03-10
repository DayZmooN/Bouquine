<?php
require_once './header-front.php';
require_once './footer-front.php';

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
    <section #catalogue>
        <div class="catal">

            <h2 class="catalog">Catalogue</h2>

            <div class="searching">
                <div class="search1">
                    <form id="recherche" method="post">
                        <input name="saisie" type="text" placeholder="Recherche" required />
                        <input class="loupe" type="submit" value="" />
                    </form>
                    <a href="#"><img class="setting" src="../image/setting.svg"></a>
                </div>
            </div>

            <div class="books">
                <div class="container-books">
                    <div class="books-catalog">
                    <div class="item4">
                        <a href="#"><img src="../image/malgre nous.jpg" alt="Malgré nous de Claire NORTON"></a>
                        <p class="titles">Malgré nous </p>
                        <p class="authors">Claire NORTON</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/romance.jpg" alt="Romance d'Arnaud CATHERINE"></a>
                        <p class="titles">ROMANCE</p>
                        <p class="authors">Arnaud CATHERINE</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/une toute derniere fois.jpg" alt="Une toute dernère fois d'Emma GREEN "></a>
                        <p class="titles">Une toute dernière fois </p>
                        <p class="authors">Emma GREEN</p>
                    </div>

                    <div class="item4"><a href="#"><img src="../image/dark romance.jpg" alt="Dark Romance de Péneloppe DOUGLAS "></a>
                        <p class="titles">DARK ROMANCE</p>
                        <p class="authors">Péneloppe DOUGLAS</p>
                    </div>
                    </div>
                    <div class="books-catalog">
                    <div class="item4">
                        <a href="#"><img src="../image/circe.jpg" alt="Circé de Madeleine MILLER"></a>
                        <p class="titles">Circé </p>
                        <p class="authors">Madeleine MILLER</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/assasin royal.jpg" alt="L'assasin royal de Robin HOBB"></a>
                        <p class="titles">L'assasin royal</p>
                        <p class="authors">Robin HOBB</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/la-croisade-eternelle.jpg" alt="La croisade éternelle de Victor Fleury"></a>
                        <p class="titles">La croisade éternelle </p>
                        <p class="authors">Victor Fleury</p>
                    </div>

                    <div class="item4"><a href="#"><img src="../image/sistine.jpg" alt="Sixtine de Caroline VERMALLE"></a>
                        <p class="titles">Sixtine</p>
                        <p class="authors">Caroline VERMALLE</p>
                    </div>
                    </div>
                    <div class="books-catalog">
                    <div class="item4">
                        <a href="#"><img src="../image/pris en otage.jpg" alt="Pris en otage de Pierre Martinet"></a>
                        <p class="titles">Pris en otage </p>
                        <p class="authors">Pierre MARTINET</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/la vague.jpg" alt="La vague de Tod STRASSER"></a>
                        <p class="titles">La vague</p>
                        <p class="authors">Tod STRASSER</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/outsphere.jpg" alt="Outsphère de Guy-Roger DUVERT"></a>
                        <p class="titles">Outsphère </p>
                        <p class="authors">Guy-Roger DUVERT</p>
                    </div>

                    <div class="item4"><a href="#"><img src="../image/l espion du pape.jpg" alt="L'espion du pape de Philippe Madral et François Migeat"></a>
                        <p class="titles">L'espion du pape</p>
                        <p class="authors">Philippe MADRAL</p>
                    </div>
                    </div>
                    <div class="books-catalog">
                    <div class="item4">
                        <a href="#"><img src="../image/star wars.jpg" alt="Star wars de Mike CHEN"></a>
                        <p class="titles">STAR WARS</p>
                        <p class="authors">Mike CHEN</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/romance.jpg" alt="Romance d'Arnaud CATHERINE "></a>
                        <p class="titles">ROMANCE</p>
                        <p class="authors">Arnaud CATHERINE</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/assasin royal.jpg" alt="L'assasin Royal de Robin HOBB "></a>
                        <p class="titles">L'ASSASIN ROYAL </p>
                        <p class="authors">Robin HOBB</p>
                    </div>
                    <div class="item4"><a href="#"><img src="../image/assasin royal.jpg" alt="L'assasin Royal de Robin HOBB "></a>
                        <p class="titles">L'ASSASIN ROYAL </p>
                        <p class="authors">Robin HOBB</p>
                    </div>
                    </div>

                </div>
            </div>

    </section>
</body>

</html>