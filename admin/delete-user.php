<?php
session_start();
require_once '../connexion.php';
include './header-admin.php';

try {
    $successMessage = "";
    if (isset($_SESSION['success'])) {
        $successMessage = $_SESSION['success'];
        // Remove the success message from the session to prevent it from being displayed multiple times
        unset($_SESSION['success']);
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $reqdel = $db->prepare("DELETE FROM `user` WHERE `id_user` = :id");
        $reqdel->bindParam('id', $id, PDO::PARAM_INT);
        $reqdel->execute();

        header('Location: ./user.php');
        exit();
        $_SESSION["success"] = " user a bien été suprimé";
        exit();
    }
} catch (PDOException $e) {
    $_SESSION["error"] = "Votre user n'a pas été supprimé";
    header('Location: ./user.php');
    exit();
}
