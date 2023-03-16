<?php
 session_start();
 try{
     require_once '../connexion.php';
     $id = $_GET['id'];
     $reqdel = $db->prepare("DELETE FROM `user` WHERE `id_user` = :id");
     $reqdel->bindParam('id',$id, PDO::PARAM_INT);
     $reqdel->execute();
     $_SESSION["success"] = "Votre user à bien été supprimé";
     header('Location: ./user.php');
     exit();
 }catch (PDOException $e){
     $_SESSION["error"] = "Votre user n'a pas été supprimé";
     header('Location: ./user.php');
     exit();
 }
?>