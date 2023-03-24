<?php
require_once '../model/fonction-inscription.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquine</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
    <section id="suscribe">
        <div id="bouquine"></div>
        <div class="container-suscribe">

            <div class="img-book">
                <img src="../image/etudiant.jpg" alt="Un étudiant porte un livre dnas les mains">

            </div>

            <div class="suscribe-form">

                <h2 class="sus-form">Créer un compte</h2>
                <form id="connect" action="../model/fonction-inscription.php" method="POST">
                    <div class="input">
                        <label>Nom</label>
                        <input type="lastname" id="name" name="lastname" placeholder="Votre nom" />

                        <label>Prénom</label>
                        <input type="username" id="username" name="username" placeholder="Votre prénom" />

                        <label>Téléphone</label>
                        <input type="number" name="phone" id="phone" placeholder="0123456789">

                        <label>Date de naissance</label>
                        <input type="date" id="birth" name="birthdate" placeholder="Votre date de naissance" />

                        <label>E-mail</label>
                        <!-- <input type="email" id="mail" name="mail" placeholder="Adresse mail" />
                        <label>Confirmez votre e-mail</label> -->
                        <input type="email" id="mail" name="mail" placeholder="Adresse mail" />

                        <label>Mot de passe (8 caractères minimum requis )</label>
                        <input type="password" id="password" name="password" placeholder="Mot de passe" minlength="8" required>
                        <!-- <div class="checkbox">
                            <input type="checkbox" id="accept" required>
                            <label for="accept">J'accepte les conditions générales de confidentialité<br>
                                et d'utilisation </label>
                        </div> -->
                    </div>
                    
                        <button id="btn-create" type="submit"><a href=""> Créer mon compte</button></a>
                    </div>
                </form>

            </div>

        </div class="container-suscribe">
    </section>

</body>

</html>