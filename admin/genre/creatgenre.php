<?php
session_start();

try {
    require_once '../auth.php';

    $req = $db->prepare("INSERT INTO `genre` (`libel_genre`, `genre_slug`) VALUES (:libel_genre, :genre_slug)");
    $req->bindValue(":libel_genre", $_POST["libel_genre"], PDO::PARAM_STR);
    $req->bindValue(":genre_slug", $_POST["genre_slug"], PDO::PARAM_STR);
    $req->execute();
    $_SESSION["success"] = "votre genre a bien été crée";
    header('location: ./genre.php');
} catch (PDOException $e) {
    $_SESSION["error"] = "Votre Genre n'a pas été crée";
    header('Location: ./genre.php');
    exit();
}
