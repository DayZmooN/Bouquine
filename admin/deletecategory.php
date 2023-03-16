<?php
session_start();
try {
    require_once './auth.php';
    $id = $_GET['id'];
    $reqdel = $db->prepare("DELETE FROM `category` WHERE `id_category` = :id");
    $reqdel->bindParam('id', $id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "votre category à bien été supprimé";
    header('location: ./category.php');
    exit();
} catch (PDOException $e) {
    $_SESSION["error"] = "Votre category n'a pas été supprimé";
    header('Location: ./category.php');
    exit();
}
