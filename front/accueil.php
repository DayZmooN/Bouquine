<?php
require_once './header-front.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquine</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- /<link rel="stylesheet" href="../css/bootstrap.min.css"> -->
</head>

<body>
    <!-- SECTION 1 EN TETE  -->
    <main>
        <section class="parallax-section">
            <div class="parallax parallax1">
                <h1>Bouquine</h1>
                <p id="explain"> C'est un lieu de savoir et de <br> découverte qui abrite
                    une vaste <br>collection de documents<br> imprimés
                    ainsi que des<br> ressources numériques pour<br> répondre
                    à tous vos besoins de<br> recherche et de lecture.</p>
            </div>
        </section>


        <section class="populaire">
            <div class="titre1">
                <h2 class="popular">Les plus populaires </h2>
            </div>
            <div class="container">
                <div class="item">
                    <a href="#"><img src="../image/star wars.jpg" alt="Star wars de Mike CHEN"></a>
                    <button id="resume" type="button"><a href="#">Résumé</a></button>
                    <p class="title">STAR WARS</p><br>
                    <p class="author">Mike CHEN</p>
                </div>
                <div class="item"><a href="#"><img src="../image/romance.jpg" alt="Romance d'Arnaud CATHERINE "></a>
                    <button id="resume" type="button"><a href="#">Résumé</a></button>
                    <p class="title">ROMANCE</p><br>
                    <p class="author">Arnaud CATHERINE</p>
                </div>
                <div class="item"><a href="#"><img src="../image/assasin royal.jpg" alt="L'assasin Royal de Robin HOBB "></a>
                    <button id="resume" type="button"><a href="#">Résumé</a></button>
                    <p class="title">L'ASSASIN ROYAL </p><br>
                    <p class="author">Robin HOBB</p>
                </div>

                <div class="item"><a href="#"><img src="../image/dark romance.jpg" alt="Dark Romance de Péneloppe DOUGLAS "></a>
                    <button id="resume" type="button"><a href="#">Résumé</a></button>
                    <p class="title">DARK ROMANCE</p><br>
                    <p class="author">Péneloppe DOUGLAS</p>
                </div>

                <div class="item"><img src="../image/circe.jpg" alt="Circé de Madeleine MILLER  "></a>
                    <button id="resume" type="button"><a href="#">Résumé</a></button>
                    <p class="title">CIRCE</p><br>
                    <p class="author">Madeleine MILLER</p>
                </div>

                <div class="item"><a href="#"><img src="../image/dans ma tete.jpg" alt="J'ai tout dans ma tête de Rachel ARDITI"></a>
                    <button id="resume" type="button"><a href="#">Résumé</a></button>
                    <p class="title">J'AI TOUT DANS MA TETE</p><br>
                    <p class="author">Rachel ARDITI</p>
                </div>

                <div class="item"><a href="#"><img src="../image/aime moi.jpg" alt="Aime moi de Morgane MONTCOMBLE "></a>
                    <button id="resume" type="button"><a href="#">Résumé</a></button>
                    <p class="title">AIME MOI </p><br>
                    <p class="author">Morgane MONTCOMBLE</p>
                </div>
                <div class="item">
                    <a href="#"><img src="../image/crepuscule.jpg" alt="Crépuscule de Philippe CLAUDEL "></a>
                    <button id="resume" type="button"><a href="#">Résumé</a></button>
                    <p class="title">CREPUSCULE</p><br>
                    <p class="author">Philippe CLAUDEL</p>
                </div>

            </div>
        </section>

        <!-- END SECTION POPULAIRES -->

        <!-- SECTION NOUVEAUTES -->

        <section id="new">
            <h2 id="nouveautes">Nouveautés</h2>
            <div class="slider">
                <div class="slider-view">
                    <div id="slide1">
                        <div id="slide2">
                            <div id="slide3">
                                <div id="slide4">

                                    <div class="slide-container">
                                        <img src="../image/cohen.jpg" alt="Livres romans français ">
                                        <img src="../image/livres nature.jpg" alt="Livres de nature collection de poche">
                                        <img src="../image/roman jeunesse.jpg" alt="Livres roman jeunesse de poche">
                                        <img src="../image/stephen king.jpg" alt="Collection de livres de Stephen King ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-nav">
                        <a href="#slide1"></a>
                        <a href="#slide2"></a>
                        <a href="#slide3"></a>
                        <a href="#slide4"></a>

                    </div>
                </div>

        </section>
        <!-- end section nouveautes  -->

        <!-- section genres preferes -->
        <section id="gender">
            <div class="genre">
                <h2 id="prefers">Les genres préférés</h2>
                <h3 id="romance">Romance</h3>

                <div class="container">
                    <div class="item1">
                        <a href="#"><img src="../image/malgre nous.jpg" alt="Malgré nous de Claire NORTON"></a>
                        <p class="title">Malgré nous </p><br>
                        <p class="author">Claire NORTON</p>
                    </div>
                    <div class="item1"><a href="#"><img src="../image/romance.jpg" alt="Romance d'Arnaud CATHERINE"></a>
                        <p class="title">ROMANCE</p><br>
                        <p class="author">Arnaud CATHERINE</p>
                    </div>
                    <div class="item1"><a href="#"><img src="../image/une toute derniere fois.jpg" alt="Une toute dernère fois d'Emma GREEN "></a>
                        <p class="title">Une toute dernière fois </p><br>
                        <p class="author">Emma GREEN</p>
                    </div>

                    <div class="item1"><a href="#"><img src="../image/dark romance.jpg" alt="Dark Romance de Péneloppe DOUGLAS "></a>
                        <p class="title">DARK ROMANCE</p><br>
                        <p class="author">Péneloppe DOUGLAS</p>
                    </div>

                    <button id="see" type="button"><a href="#">Voir plus</a></button>


                </div>

<!-- debut genre fantaisie -->

<div class="genre">
              
                <h3 id="fantaisie">Fantaisie</h3>

                <div class="container">
                    <div class="item2">
                        <a href="#"><img src="../image/circe.jpg" alt="Circé de Madeleine MILLER"></a>
                        <p class="title">Circé </p><br>
                        <p class="author">Madeleine MILLER</p>
                    </div>
                    <div class="item2"><a href="#"><img src="../image/assasin royal.jpg" alt="L'assasin royal de Robin HOBB"></a>
                        <p class="title">L'assasin royal</p><br>
                        <p class="author">Robin HOBB</p>
                    </div>
                    <div class="item2"><a href="#"><img src="../image/la-croisade-eternelle.jpg" alt="La croisade éternelle de Victor Fleury"></a>
                        <p class="title">La croisade éternelle </p><br>
                        <p class="author">Victor Fleury</p>
                    </div>

                    <div class="item2"><a href="#"><img src="../image/sistine.jpg" alt="Sixtine de Caroline VERMALLE"></a>
                        <p class="title">Sixtine</p><br>
                        <p class="author">Caroline VERMALLE</p>
                    </div>

                    <button id="see" type="button"><a href="#">Voir plus</a></button>


                </div>





        </section>
    </main>







</body>

</html>