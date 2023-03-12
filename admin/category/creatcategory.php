<?php
session_start();

try {
    //on se connecte a la bdd
    require_once '../auth.php';

    //on cree la requete pour inserer en bdd 
    $req = $db->prepare("INSERT INTO `category` (`libel_category`, `libel_slug`) VALUES (:libel_category, :libel_slug)");
    $req->bindValue(":libel_category", $_POST["libel_category"], PDO::PARAM_STR);
    $req->bindValue(":libel_slug", $_POST["libel_slug"], PDO::PARAM_STR);
    $req->execute();
    $_SESSION["success"] = "votre genre a bien été crée";
    header('location: ./category.php');
} catch (PDOException $e) {
    $_SESSION["error"] = "Votre Genre n'a pas été crée";
    header('Location: ./category.php');
    exit();
}
