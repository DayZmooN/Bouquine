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
        $query->bindValue(":username", $pseudo, PDO::PARAM_STR);
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
            "username" => $username["username"],
            "mail" => $_POST["mail"],
            "lastname" => $_POST["lastname"],
            "phone" => $_POST["phone"],
            "birthdate" => $_POST["birthdate"],
            "roles" => $user["roles"]
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