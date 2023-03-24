<?php
require_once './auth.php';
include './header-admin.php';
session_start();

try {
    $successMessage = "";
    if (isset($_SESSION['success'])) {
        $successMessage = $_SESSION['success'];
        // Remove the success message from the session to prevent it from being displayed multiple times
        unset($_SESSION['success']);
    }
    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $reqdel = $db->prepare("DELETE FROM `category` WHERE `id_category` = :id");
        $reqdel->bindParam('id', $id, PDO::PARAM_INT);
        $reqdel->execute();
        $_SESSION["success"] = "votre category à bien été supprimé";

        // Rediriger l'utilisateur vers la page des articles
        header('location: ./category.php');
        $_SESSION["success"] = "Votre CATÉGORIES a bien été suprimé";
        exit();
    }
} catch (PDOException $e) {
    $_SESSION["error"] = "Votre category n'a pas été supprimé";
    header('Location: ./category.php');
    exit();
}
