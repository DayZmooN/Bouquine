<h1>Covers</h1>
<?php
//Afficher les images de couvertures à partir de la base de données
require_once '../connexion.php';

$req = $db->query("SELECT `image` FROM `book`");
while($data = $req->fetch()){
    echo "<img src='../image/".$data['image']."'>";
}
?>