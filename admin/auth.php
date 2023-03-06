<?php
session_start();
require_once '../model/connexion.php';
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];
$req = $db->prepare('SELECT `id`, `pseudo`,`password` FROM `user` WHERE `pseudo`= :pseudo');
$req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
$req->execute();

if ($req->rowCount() == 1) {
    $user = $req->fetch(PDO::FETCH_ASSOC);

    if ($user['password'] === $password) {
        $_SESSION['id-user'] = $user['id'];
        header('location: ./dashboard.php?err=1');
    } else {
        header('location: ../front/connect.php?err=1');
    }
} else {
    header('location: ../front/connect.php?err=1');
}
