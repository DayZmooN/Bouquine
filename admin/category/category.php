<?php
require_once '../auth.php';

//READ
//la Requete SQL -> Récuperer TOUTES les données de TOUS les category de la DB 

$req = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`');
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
    <title>Liste Category</title>
</head>

<body>
    <?php
    foreach ($resultat as $category) {
    ?>
        <div style="display:flex;">
            <p style="font-size: 2rem;margin:0 20px;"><?= $category['libel_category'] ?></p>
            <button type="submit"><a href="./deletecategory.php?id=<?= $category['id_category'] ?>">supprimer</a></button>
            <button type="submit"><a href="./editcategory.php?id=<?= $category['id_category'] ?>">modifier</a></button>
        </div>
    <?php } ?>
    <form style="margin: 100px; display:flex; font-size:larger;  " action="./creatcategory.php" method="post">
        <label for="libel_category">Ajouter libel du category</label>
        <input type="text" name="libel_category" id="category">
        <label for="libel_slug">Ajouter un category</label>
        <input type="text" name="libel_slug" id="category">
        <button type="submit">Envoyer<a href="./creatcategory.php"></a></button>
    </form>
</body>

</html>