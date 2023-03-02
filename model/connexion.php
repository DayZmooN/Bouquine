<?php
function connection() {
try {
    $db = new PDO('mysql:host=localhost;dbname=bouquine; charset=utf8', 'root');
} catch (PDOException $e) {
    echo 'Erreur:' . $e->getMessage() . '<br>';
}}

?>