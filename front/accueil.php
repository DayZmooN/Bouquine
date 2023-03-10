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
                <div class="contain-book">
                <!-- <div class="item"> -->
                    <a href="#"><img src="../image/star wars.jpg" alt="Star wars de Mike CHEN"></a>
                    <!-- <button id="resume" type="button"><a href="#">Résumé</a></button> -->
                    <div class="item-title">
                    <p class="title">STAR WARS</p><br>
                    <p class="author">Mike CHEN</p>
                    </div>
                <!-- </div> -->
                <!-- <div class="item"> -->
                    <a href="#"><img src="../image/romance.jpg" alt="Romance d'Arnaud CATHERINE "></a>
                    <!-- <button id="resume" type="button"><a href="#">Résumé</a></button>-->
                    <div class="item-title"> 
                    <p class="title">ROMANCE</p><br>
                    <p class="author">Arnaud CATHERINE</p>
                    </div>
                <!-- </div> -->
                <!-- <div class="item"> -->
                    <a href="#"><img src="../image/assasin royal.jpg" alt="L'assasin Royal de Robin HOBB "></a>
                    <!-- <button id="resume" type="button"><a href="#">Résumé</a></button> -->
                    <div class="item-title">
                    <p class="title">L'ASSASIN ROYAL </p><br>
                    <p class="author">Robin HOBB</p>
                    </div>
                <!-- </div> -->

                <!-- <div class="item"> -->
                    <a href="#"><img src="../image/dark romance.jpg" alt="Dark Romance de Péneloppe DOUGLAS "></a>
                    <!-- <button id="resume" type="button"><a href="#">Résumé</a></button> -->
                     <div class="item-title"> <p class="title">DARK ROMANCE</p><br>
                    <p class="author">Péneloppe DOUGLAS</p>
                     </div> 
                <!-- </div> -->
                </div>
                <div class="contain-book">
                <!-- <div class="item"> -->
                    <img src="../image/circe.jpg" alt="Circé de Madeleine MILLER  "></a>
                    <!-- <button id="resume" type="button"><a href="#">Résumé</a></button> -->
                    <div class="item-title">
                    <p class="title">CIRCE</p><br>
                    <p class="author">Madeleine MILLER</p>
                    </div>
                <!-- </div> -->

                <!-- <div class="item"> -->
                    <a href="#"><img src="../image/dans ma tete.jpg" alt="J'ai tout dans ma tête de Rachel ARDITI"></a>
                    <!-- <button id="resume" type="button"><a href="#">Résumé</a></button> -->
                    
                    <div class="item-title">
                        <p class="title">J'AI TOUT DANS MA TETE</p><br>
                    <p class="author">Rachel ARDITI</p>
                    </div>
                <!-- </div> -->

                <!-- <div class="item"> -->
                    <a href="#"><img src="../image/aime moi.jpg" alt="Aime moi de Morgane MONTCOMBLE "></a>
                    <!-- <button id="resume" type="button"><a href="#">Résumé</a></button> -->
                    <div class="item-title">
                    <p class="title">AIME MOI </p><br>
                    <p class="author">Morgane MONTCOMBLE</p>
                    </div>
                <!-- </div> -->
                <!-- <div class="item"> -->
                    <a href="#"><img src="../image/crepuscule.jpg" alt="Crépuscule de Philippe CLAUDEL "></a>
                    <!-- <button id="resume" type="button"><a href="#">Résumé</a></button> -->
                    <div class="item-title">
                    <p class="title">CREPUSCULE</p><br>
                    <p class="author">Philippe CLAUDEL</p>
                    </div>
                <!-- </div> -->
                </div>
            </div>
        </section>

        <!-- END SECTION POPULAIRES -->

        <!-- SECTION NOUVEAUTES -->

        <section id="new">
            <h2 id="nouveautes">Nouveautés</h2>
            <ul class=slider>

                <li><img src="../image/cohen.jpg" alt></li>
                <li><img src="../image/livres nature.jpg" alt></li>
                <li><img src="../image/stephen king.jpg" alt></li>

            </ul>

        </section>
        <!-- end section nouveautes  -->

        <!-- section genres preferes -->
        <section id="gender">
            <div class="genre">
                <h2 id="prefers">Les genres préférés</h2>
                <h3 id="romance">Romance</h3>

                <div class="container1">
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

                    <div class="container2">
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

                    <!-- début genre action -->

                    <div class="genre">

                        <h3 id="action">Action</h3>

                        <div class="container3">
                            <div class="item3">
                                <a href="#"><img src="../image/pris en otage.jpg" alt="Pris en otage de Pierre Martinet"></a>
                                <p class="title">Pris en otage </p><br>
                                <p class="author">Pierre MARTINET</p>
                            </div>
                            <div class="item3"><a href="#"><img src="../image/la vague.jpg" alt="La vague de Tod STRASSER"></a>
                                <p class="title">La vague</p><br>
                                <p class="author">Tod STRASSER</p>
                            </div>
                            <div class="item3"><a href="#"><img src="../image/outsphere.jpg" alt="Outsphère de Guy-Roger DUVERT"></a>
                                <p class="title">Outsphère </p><br>
                                <p class="author">Guy-Roger DUVERT</p>
                            </div>

                            <div class="item3"><a href="#"><img src="../image/l espion du pape.jpg" alt="L'espion du pape de Philippe Madral et François Migeat"></a>
                                <p class="title">L'espion du pape</p><br>
                                <p class="author">Philippe MADRAL</p>
                            </div>

                            <button id="see" type="button"><a href="#">Voir plus</a></button>


                        </div>



        </section>
        <!-- END SECTION GENRE LES PLUS LUS  -->
        <!-- SECTION TEXTE -->

        <section id="text">
            <div class="texte">
                <p class="bouquine">BOUQUINE c’est :<br></p>
                <ul class="list">
                    <li>La recherche de livres : Les utilisateurs<br> peuvent effectuer des recherches
                        en<br> ligne pour trouver des livres disponibles.</li>

                    <li>La réservation de livres : possibilité de<br> réserver des livres en ligne
                        pour les emprunter à une date ultérieure.</li>

                    <li>Le prêt de livres : possibilité<br> d' emprunter
                        les livres réservés et les<br> retirer à la bibliothèque.</li>

                    <li>Le renouvellement de prêts :<br> possibilité renouveler
                        leurs emprunts<br> en ligne pour prolonger la période de prêt.</li>

                    <li>La consultation et lecture sur place.</li>

                </ul>

            </div>
            <div class="img">
                <img class="image" src="../image/femme-livre.png" alt="Retrouvez le plaisir de la lecture avec Bouquine ">
            </div>

        </section>

        <!-- END SECTION TEXTE -->

        <!-- SECTION NEWSLETTER -->


        <section class="parallax-section newsletter">
            <div class="parallax parallax1 news">

                <h2 id="titl">Newsletter gratuite</h2>
                <div class="formulaire">
                    <form action="subscribing-newsletter" method="post">
                        <label for="email">E-mail:</label>
                        <input id="email" name="subscriber_email" type="email" />
                        <button id="send" type="submit">S'abonner </button>

                    </form>
                </div>
                <p class="abonner">N'hésitez pas à vous abonner pour recevoir en exclusivité chaque mois les
                    dernières nouveautés et évènements de la bibliothèque.Nous ne vous enverrons pas de spam
                    ni ne partagerons vos informations.</p>

            </div>
        </section>
        <!-- END SECTION NEWSLETTER -->

        <!-- SECTION CONTACT -->

        <section id="contact">
            <h2 id="us">Contact</h2>
            <div class="container-contact">

                <div class="localisation">
                    <a href="https://goo.gl/maps/jTEf4EwKz4geiEws5"><img src="../image/localisation.png" alt="adresse de bouquine"></a>
                    <p class="adress">21 rue du Calidon<br> 01000 <br>Saint Denis les Bourg</p>
                </div>
                <div class="horaire">
                    <img src="../image/clock.svg" alt="horaire de bouquine">
                    <p class="hour">Du lundi au Samedi <br>de 9h à 18h non stop</p>
                </div>

                <div class="mail">
                    <img src="../image/enveloppe.png" alt="contactez-nous par mail ou tel"></a>
                    <p class="contactus"><a href="tel:+3374212363"> &nbsp; &nbsp; &nbsp;Tél:04.74.21.23.63 </a><br>
                        <a href="mailto:bouquine@orange.fr">Mail:bouquine@orange.fr
                    </p></a>
                </div>
            </div>
        </section>

        <!-- END SECTION CONTACT -->

        <!-- SECTION COMPTEUR -->

        <section class="parallax-section compteur">
            <div class="parallax parallax1 count">
                <div class="stat">
                    <p class="livre">Livres disponibles</p>
                    <p class="livre">+4000 livres</p>
                </div>
                <div class="stat">
                    <p class="livre">Livres empruntés</p>
                    <p class="livre">1500 livres</p>
                </div>
                <div class="stat">
                    <p class="livre">Visiteurs</p>
                    <p class="livre">3500</p>
                </div>

                <div class="stat">
                    <p class="livre">Satisfaction client</p>
                    <img id="stars" src="../image/stars.png" alt="nombre d'étoiles pour les avis ">
                    <p class="livre">4.5/5</p>
                </div>
            </div>

        </section>

        <!-- END SECTION COMPTEUR  -->

        <!-- SECTION AVIS DES LECTEURS  -->

        <section id="lecteur">
            <h2 class="lector">Avis des lecteurs</h2>
            <div class="avis">
                <div class="notice">
                    <h3 class="name">Cécile Randu</h3>
                    <img src="../image/avis1.jpg" alt="avis favorable ">
                    <p class="value">La bibliothèque Bouquine est un lieu d'apprentissage formidable pour les
                        enfants. Ma famille et moi-même
                        aimons passer du temps à y lire ensemble.</p>
                </div>
                <div class="notice">
                    <h3 class="name">Cédric Durand</h3>
                    <img src="../image/avis2.jpg" alt="avis favorable ">
                    <p class="value">Très bonne bibliothèque, endroit calme, large choix de livres. Idéal pour tous les étudiants.
                        Personnel très compétent et réactif! <br>Je recommande fortement! </p>
                </div>
                <div class="notice">
                    <h3 class="name">Anaïs Dunand</h3>
                    <img src="../image/avis3.jpg" alt="avis favorable ">
                    <p class="value">Réservation en ligne pour plus de rapidité, service et personnel agréable.<br>
                        Je recommande vivement. </p>
                </div>

            </div>

        </section>
        <!-- end section avis lecteur  -->
    </main>

</body>

</html>