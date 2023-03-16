<?php
require_once '../auth.php';

//READ
//la Requete SQL -> Récuperer TOUTES les données de TOUS les Genre de la DB 

$req = $db->prepare('SELECT `id_genre`, `libel_genre`, `genre_slug` FROM `genre`');
// $req->bindParam('libel_genre', 'genre_slug', PDO::PARAM_STR);
$req->execute();
// Stocke requête dans tableau associatif
$resultat = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Genre</title>
</head>

<body>
    <?php
    foreach ($resultat as $genre) {
    ?>
        <div style="display:flex;">
            <p style="font-size: 2rem;margin:0 20px;"><?= $genre['libel_genre'] ?></p>
            <button type="submit"><a href="./deletegenre.php?id=<?= $genre['id_genre'] ?>">supprimer</a></button>
            <button type="submit"><a href="./editgenre.php?id=<?= $genre['id_genre'] ?>">modifier</a></button>
        </div>
    <?php } ?>
    <form style="margin: 100px; display:flex; font-size:larger;  " action="./creatgenre.php" method="post">
        <label for="libel_genre">Ajouter libel du genre</label>
        <input type="text" name="libel_genre" id="genre">
        <label for="genre_slug">Ajouter un slug</label>
        <input type="text" name="genre_slug" id="genre">
        <button type="submit">Envoyer<a href="./creatgenre.php"></a></button>
    </form>
</body>

</html>