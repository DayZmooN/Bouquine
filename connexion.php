<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=bouquine; charset=utf8', 'root');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
    echo 'Erreur:' . $e->getMessage() . '<br>';
}
?>