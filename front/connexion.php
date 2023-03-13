<?php
//on démarre une session PHP
session_start();
//protection pour empeche d'acceder a url
if (isset($_SESSION["user"])) {
    header("location: dashboard.php");
    exit;
}

//on verifie si le formulaire a été envoyé
if (!empty($_POST)) {
    // le formulaire a été envoyer 
    // on verifie que tous le champ sont requis sont remplis 
    if (
        isset($_POST["mail"], $_POST["password"])
        && !empty($_POST["mail"]) && !empty($_POST["password"])
    ) {
        //On verifie que email en est un 
        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            die("Ce n'est pas un email");
        }
        // On va se connecter a la bdd
        require_once "./connect.php";


        //on recherche dans la table user 
        $sql = "SELECT * FROM `user` WHERE `mail`= :mail";
        $query = $db->prepare($sql);
        $query->bindValue(":mail", $_POST["mail"], PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            die("L'email et/ou le mot de passe est incorrect.");
        }

        //ici le l'utilisateur et le mot de passe son correcte
        //on va pouvoir "connecter" l'utilisateur
        if ($user) {
            // ici on a un user existant, on peut vérifier le mot de passe 
            if (!password_verify($_POST["password"], $user["password"])) {
            }

            //on stocke dans $_SESSION LES information de l'utilisateur
            $_SESSION["user"] = [
                "id" => $user["id_user"],
                "username" => $user["username"],
                "mail" => $user["mail"],
                "lastname" => $user["lastname"],
                "phone" => $user["phone"],
                "birthdate" => $user["birthdate"],
                "roles" => $user["roles"]
            ];
            header("location: dashboard.php");
        }
    }

    //Ajoutez ici tous les controles souhaités exemple double verifiacation de la sassie du mot de passe



}

// on inclut le header 
include_once './header.php';
?>

<h1>connexion</h1>

<form method="post">

    <div>
        <label for="mail">Email</label>
        <input type="email" name="mail" id="mail">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <button type="submit">Me Connexion</button>
    </div>

</form>
<?php
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
    <section id="connexion">
        <div class="lettreb">
            <img class="b" src="../image/b.png" alt="logo bouquine">
        </div>
        <h2 class="connect">Se connecter</h2>

        <div class="social-media">
            <p><a href="https://www.google.com/intl/fr/gmail/about/"><i class='fab fa-google' style='font-size:24px'></i></p></a>
            <p><a href="https://fr-fr.facebook.com/"><i class="fab fa-facebook-f" style='font-size:24px'></i></p></a>
            <p><a href="https://twitter.com/?lang=fr"><i class="fab fa-twitter" style='font-size:24px'></i></p></a>
        </div>
        <p class="email">ou utiliser mon adresse e-mail :</p>

        <form action="#" method="POST">
            <div class="inputs">
                <input type="email" id="mail" name="mail" placeholder="Email" />
                <input type="password" id="password" name="password" placeholder="Mot de passe">
            </div>

            <p class="inscription"><a href="#">J'ai oublié mon mot de passe</a><br>
                Je n'ai pas de compte.<a href="#"> S'inscrire</a></p>
            <div align="center">
                <button type="submit"><a href="#"> Se connecter</button></a>
            </div>
        </form>
    </section>










</body>

</html>