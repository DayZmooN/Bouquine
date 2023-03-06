<?php
function connection()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=bouquine', 'root', '');
        $db->exec('SET NAMES "UTF8"');
    } catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage() . '<br>';
        die();
    }
}
