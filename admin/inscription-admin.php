<?php
//on démarre une session PHP
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: profil.php");
    exit;
}
//on verifie si le formulaire a été envoyé
if (!empty($_POST)) {
    // var_dump($_POST);

    // le formulaire a été envoyer 
    // on verifie que tous le champ sont requis sont remplis 
    if (
        isset($_POST["username"], $_POST["mail"], $_POST["password"])
        && !empty($_POST["username"]) && !empty($_POST["mail"]) && !empty($_POST["password"])
    ) {
        //le formulaire est complet
        // on recupère les données en les protegeant 
        $username = strip_tags($_POST["username"]);
        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        }

        // On va hasher le mot de passe
        $password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
        // die($password);


        //Ajoutez ici tous les controles souhaités 


        // on va enregistre en bdd
        require_once "../front/connect.php";


        $sqlAdmin = "INSERT INTO `admin` (`password`, `username`, `mail`) VALUES (:password, :username, :mail)";

        $queryAdmin = $db->prepare($sqlAdmin);

        $queryAdmin->bindValue(":mail", $_POST["mail"], PDO::PARAM_STR);
        $queryAdmin->bindValue(":password", $password, PDO::PARAM_STR);
        $queryAdmin->bindValue(":username", $username, PDO::PARAM_STR);
        $queryAdmin->execute();
        //on recupere id du nouvel utilisateur 
        $id = $db->lastInsertId();

        //  On connectera l'utilisateur 


        //on stocke dans $_SESSION LES information de l'utilisateur
        $_SESSION["admin"] = [
            "username" => $username["username"],
            "mail" => $_POST["mail"]
        ];
        // on peut rediriger vers la page de profil (par exemple )
        header("location: profil-admin.php");
    } else {
        die("le formulaire est incomplet ");
    }
}

include_once './header-admin.php';
?>

<h1>Inscription</h1>

<form method="post">
    <div>
        <label for="username">Name</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="mail">E-mail Admin</label>
        <input type="email" name="mail" id="mail">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <button type="submit">M'inscrire</button>
    </div>

</form>