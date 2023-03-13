<?php
//on démarre une session PHP
session_start();
if (isset($_SESSION["user"])) {
    header("location: dashboard.php");
    exit;
}
//on verifie si le formulaire a été envoyé
if (!empty($_POST)) {
    // var_dump($_POST);

    // le formulaire a été envoyer 
    // on verifie que tous le champ sont requis sont remplis 
    if (
        isset($_POST["username"], $_POST["mail"], $_POST["password"], $_POST["lastname"], $_POST["phone"], $_POST["birthdate"])
        && !empty($_POST["username"]) && !empty($_POST["mail"]) && !empty($_POST["password"]) && !empty($_POST["lastname"]) && !empty($_POST["phone"]) && !empty($_POST["birthdate"])
    ) {
        //le formulaire est complet
        // on recupère les données en les protegeant 
        $username = strip_tags($_POST["username"]);
        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        }

        // On va hasher le mot de passe
        $pass = password_hash($_POST["password"], PASSWORD_ARGON2ID);
        // die($pass);


        //Ajoutez ici tous les controles souhaités 


        // on va enregistre en bdd
        require_once "./connect.php";

        $sql = "INSERT INTO `user` (`password`, `username`, `lastname`, `mail`, `phone`, `birthdate`) VALUES (:password, :username, :lastname, :mail, :phone, :birthdate)";
        $sqlAdmin = "INSERT INTO `admin` (`password`, `username`, `mail`) VALUES (:password, :username, :mail)";

        $query = $db->prepare($sql);
        $query->bindValue(":password", $pass, PDO::PARAM_STR);
        $query->bindValue(":username", $username, PDO::PARAM_STR);
        $query->bindValue(":lastname", $_POST["lastname"], PDO::PARAM_STR);
        $query->bindValue(":mail", $_POST["mail"], PDO::PARAM_STR);
        $query->bindValue(":phone", $_POST["phone"], PDO::PARAM_STR);
        $query->bindValue(":birthdate", $_POST["birthdate"], PDO::PARAM_STR);
        $query->execute();

        $id = $db->lastInsertId();
        //  On connectera l'utilisateur 


        //on stocke dans $_SESSION LES information de l'utilisateur
        $_SESSION["user"] = [
            "id" => $id,
            "username" => $username,
            "mail" => $_POST["mail"],
            "lastname" => $_POST["lastname"],
            "phone" => $_POST["phone"],
            "birthdate" => $_POST["birthdate"]
        ];
        // on peut rediriger vers la page de profil (par exemple )
        header("location: dashboard.php");
    } else {
        die("le formulaire est incomplet ");
    }
}

include_once './header.php';
?>

<h1>Inscription</h1>

<form method="post">
    <div>
        <label for="username">Name</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="lastname">lastname</label>
        <input type="text" name="lastname" id="lastname">
    </div>
    <div>
        <label for="birthdate">birthdate</label>
        <input type="date" name="birthdate" id="birthdate">
    </div>
    <div>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="phone">Votre Numéro</label>
        <input type="number" name="phone" id="phone">
    </div>

    <div>
        <button type="submit">M'inscrire</button>
    </div>

</form>
// require_once './header-front.php';
// require_once './footer-front.php';
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
        <div class="container-suscribe">
            <!-- <h2 class="sus-form">Créer un compte</h2> -->
            <div class="img-book">
                <img src="../image/etudiant.jpg" alt="Un étudiant porte un livre dnas les mains">

            </div>

            <div class="suscribe-form">
                <img class="form-logo" src="../image/b.png" alt="logo bouquine">
                <h2 class="sus-form">Créer un compte</h2>
                <form action="#" method="POST">
                    <div class="input">
                        <label>Nom</label>
                        <input type="name" id="name" name="name" placeholder="Votre nom" />
                        <label>Prénom</label>
                        <input type="username" id="username" name="username" placeholder="Votre prénom" />
                        <label>Date de naissance</label>
                        <input type="birth" id="birth" name="birth" placeholder="Votre date de naissance" />
                        <label>E-mail</label>
                        <input type="email" id="mail" name="mail" placeholder="Adresse mail" />
                        <label>Confirmez votre e-mail</label>
                        <input type="email" id="mail" name="mail" placeholder="Confirmation mail" />
                        <label>Mot de passe (8 caractères minimum requis )</label>
                        <input type="password" id="password" name="password" placeholder="Mot de passe" minlength="8" required>
                        <div class="checkbox">
                            <input type="checkbox" id="accept" required>
                            <label for="accept">J'accepte les conditions générales de confidentialité<br>
                                et d'utilisation </label>
                        </div>
                    </div>
                    <div align="center">
                        <button type="submit"><a href="#"> Créer mon compte</button></a>
                    </div>
                </form>

            </div>

        </div class="container-suscribe">
    </section>



















</body>

</html>