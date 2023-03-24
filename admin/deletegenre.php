<?php
require_once './auth.php';
include './header-admin.php';
session_start();
try {

    $id = $_GET['id'];
    $reqdel = $db->prepare("DELETE FROM `genre` WHERE `id_genre` = :id");
    $reqdel->bindParam('id', $id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "votre Genre à bien été supprimé";
    header('location: ./genre.php');
    $_SESSION["success"] = "Votre GENRES a bien été suprimé";
    exit();
} catch (PDOException $e) {
    $_SESSION["error"] = "Votre Genre n'a pas été supprimé";
    header('Location: ./genre.php');
    exit();
}
