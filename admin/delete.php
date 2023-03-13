<?php
session_start();
try{
    require_once '../connexion.php';
    $id = $_GET['id'];
    $reqdel = $db->prepare("DELETE FROM `book` WHERE `id_book` = :id");
    $reqdel->bindParam('id',$id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "Votre article à bien été supprimé";
    header('Location: ./article.php');
    exit();
}catch (PDOException $e){
    $_SESSION["error"] = "Votre article n'a pas été supprimé";
    header('Location: ./article.php');
    exit();
}
