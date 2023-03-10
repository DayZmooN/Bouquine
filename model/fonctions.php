<!--Afficher les images de couvertures à partir de la base de données (voir pour les resize)
<h1>Covers</h1>-->
<?php
require_once '../connexion.php';

/*$req = $db->query("SELECT `image` FROM `book`");
while($data = $req->fetch()){
    echo "<img src='../image/".$data['image']."'>";
}*/
?>

<!--CRUD Catégories -->

<h1>Catégories</h1>
<?php
// C R U D : READ
// Récupère la table souhaité afficher :
$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`');
$reqCat->execute();
//stocke dans tableau associatif
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
        <th>ID</th>
        <th>Catégories</th>
    </thead>
    <tbody>
        <?php
        //On créer la boucle pour auto générer les catégories
        foreach ($resultCat as $category) {
        ?>
            <tr>
                <td><?= $category['id_category'] ?></td>
                <td><?= $category['libel_category'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<hr />
<!--C R U D : CREATE -->
<h2> CREATE / Ajouts</h2>
<?php
// On vérifie que le formulaire à des données a insérer et on les récup' avec POST (submit type du bouton et la value post sont importante pour récup')
//addslashes est une fonction pour empecher les injections SQL
if (isset($_POST['submit'])) {
    $libel = addslashes($_POST['libel_category']);
    $slug = addslashes($_POST['libel_slug']);

    $reqAddCat = $db->prepare("INSERT INTO `category`(`libel_category`, `libel_slug`) VALUES (:libel,:slug)");
    $reqAddCat->bindParam('libel', $libel, PDO::PARAM_STR);
    $reqAddCat->bindParam('slug', $slug, PDO::PARAM_STR);
    $reqAddCat->execute();
}
?>
<form action="#" method="POST">
    <label for="libel_category">Catégorie</label>
    <input type="text" name="libel_category" id="libel_category">
    <br>
    <label for="slug">slug</label>
    <input type="text" name="libel_slug" id="libel_slug">
    <br>
    <button type="submit" name="submit" value="Post">Submit</button>
</form>
<hr />

<!--C R U D : Update -->
<h2> Update / Mise à jour</h2>
<?php
// IMPORTANT de récupérer l'ID de l'objet que l'on veut éditer; donc il faut mettre dans le lien 'update' la balise ?id<?= ...[ID]
// Récupère la table souhaité afficher :
$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category` WHERE `id_category` = :id');
$reqCat->bindParam('id', $id, PDO::PARAM_INT);
$reqCat->execute();
//stocke dans tableau associatif
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);

while ($category = $reqCat->fetchAll(PDO::FETCH_ASSOC)) {
?>
    <table>
        <thead>
            <th>ID</th>
            <th>Catégories</th>
        </thead>
        <tbody>
            <tr>
                <form action="#" method="POST">
                    <td><?= $category['libel_category'] ?></td>
                    <td><input type="text" name="libel" value="<?= $category['libel_category'] ?>"></td>
                    <td><?= $category['slug'] ?></td>
                    <td><input type="text" name="slug" value="<?= $category['slug'] ?>"></td>
            </tr>
        </tbody>
        <?php
        if (isset($_POST['submit'])) {
            $id = $_GET['id'];
            $libel = addslashes($_POST['libel_category']);
            $slug = addslashes($_POST['libel_slug']);

            $reqCatEd = $db->prepare("UPDATE `category` SET `libel_category`=':libel',`libel_slug`=':slug' WHERE `id_category` = :id");
            $reqCatEd->bindParam('id', $id, PDO::PARAM_INT);
            $reqCatEd->bindParam('libel', $libel, PDO::PARAM_STR);
            $reqCatEd->bindParam('slug', $slug, PDO::PARAM_STR);
            $reqCatEd->execute();
        }
        ?>
    </table>
    <button type="submit" name="submit" value="Post">Submit</button>
    </form>
<?php
}
?>


<!--C R U D : Delete -->
<?php
session_start();
try{
    require_once '../connexion.php';
    $id = $_GET['id'];
    $reqdel = $db->prepare("DELETE FROM `category` WHERE `id_category` = :id");
    $reqdel->bindParam('id',$id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "Votre article à bien été supprimé";
    header('Location: ./category.php');
    exit();
}catch (PDOException $e){
    $_SESSION["error"] = "Votre article n'a pas été supprimé";
    header('Location: ./category.php');
    exit();
}
?>