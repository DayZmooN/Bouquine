<?php
function deconnecterUtilisateur()
{
    session_start();
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        session_destroy();
        header('Location: ./acueil.php');
        exit();
    }
}
