<?php
// on démarre une session PHP
session_start();
// protection pour empêcher d'accéder à l'url
if (isset($_SESSION["admin"])) {
    header("location: ./dashboard-admin.php");

    exit;
}
// on vérifie si le formulaire a été envoyé
if (!empty($_POST)) {
    // le formulaire a été envoyé
    // on vérifie que tous les champs requis sont remplis
    if (isset($_POST["mail"], $_POST["password"]) && !empty($_POST["mail"]) && !empty($_POST["password"])) {
        // on vérifie que l'email est valide
        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            die("Ce n'est pas un email");
        }
        // on va se connecter à la BDD
        require_once "../front/connect.php";

        $sqlAdmin = "SELECT `username`, `mail`, `password` FROM `admin` WHERE `mail` = :mail";
        $queryAdmin = $db->prepare($sqlAdmin);
        $queryAdmin->bindParam("mail", $_POST["mail"], PDO::PARAM_STR);
        $queryAdmin->execute();
        $admin = $queryAdmin->fetch(PDO::FETCH_ASSOC);

        // si l'administrateur existe
        if ($admin) {
            // on vérifie le mot de passe
            if (!password_verify($_POST["password"], $admin["password"])) {
                // on stocke dans $_SESSION les informations de l'administrateur
                $_SESSION["admin"] = [
                    "username" => $admin["username"],
                    "mail" => $admin["mail"]
                ];
                // on peut rediriger vers la page de profil (par exemple)
                header("location: ./dashboard-admin.php");
                exit;
            } else {
                die(header('Location: ./connexion-admin.php?erro=1'));
                //a finir
            }
        }
    }
}
// ajoutez ici tous les contrôles souhaités