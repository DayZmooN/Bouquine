<?php
require_once '../connexion.php';
?>
<!--CRUD Catégories -->
<?php
$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category`');
$reqCat->execute();
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <thead>
        <th>ID</th>
        <th>Catégories</th>
    </thead>
    <tbody>
        <?php
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
<!--<h2> Update / Mise à jour</h2>-->
<?php
// IMPORTANT de récupérer l'ID de l'objet que l'on veut éditer; donc il faut mettre dans le lien 'update' la balise ?id<?= ...[ID]
// Récupère la table souhaité afficher :
/*$reqCat = $db->prepare('SELECT `id_category`, `libel_category`, `libel_slug` FROM `category` WHERE `id_category` = :id');
$reqCat->bindParam('id', $id, PDO::PARAM_INT);
$reqCat->execute();
//stocke dans tableau associatif
$resultCat = $reqCat->fetchAll(PDO::FETCH_ASSOC);

//while ($category = $reqCat->fetchAll(PDO::FETCH_ASSOC)) {
?>
<!-- Insérer formulaire ici-->
        <?php
        /*if (isset($_POST['submit'])) {
            $id = $_GET['id'];
            $libel = addslashes($_POST['libel_category']);
            $slug = addslashes($_POST['libel_slug']);

            $reqCatEd = $db->prepare("UPDATE `category` SET `libel_category`=':libel',`libel_slug`=':slug' WHERE `id_category` = :id");
            $reqCatEd->bindParam('id', $id, PDO::PARAM_INT);
            $reqCatEd->bindParam('libel', $libel, PDO::PARAM_STR);
            $reqCatEd->bindParam('slug', $slug, PDO::PARAM_STR);
            $reqCatEd->execute();
        }
        */ ?>
<?php
//} //PENSER A FERMER LA BOUCLE LA
?>


<!--C R U D : Delete -->
<?php
/*session_start();
try{
    require_once '../connexion.php';
    $id = $_GET['id'];
    $reqdel = $db->prepare("DELETE FROM `category` WHERE `id_category` = :id");
    $reqdel->bindParam('id',$id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "Votre article à bien été supprimé";
    header('Location: ');
    exit();
}catch (PDOException $e){
    $_SESSION["error"] = "Votre article n'a pas été supprimé";
    header('Location: ');
    exit();
}
*/ ?>

<hr />

<!--C R U D : Users -->
<!--READ -->
<h1>Users</h1>
<?php
$reqUser = $db->prepare('SELECT `id_admin`, `username`, `password`, `mail` FROM `admin`');
$reqUser->execute();
$resultUser = $reqUser->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
    <tbody>
        <?php
        //On créer la boucle pour auto générer les catégories
        foreach ($resultUser as $user) {
        ?>
            <tr>
                <td><?= $user['id_user'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['lastname'] ?></td>
                <td><?= $user['mail'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['birthdate'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<hr />
<!--CREATE -->
<?php
if (isset($_POST['submit'])) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $lastname = addslashes($_POST['lastname']);
    $mail = addslashes($_POST['mail']);
    $phone = addslashes($_POST['phone']);
    $birthdate = addslashes($_POST['birthdate']);

    $reqAddUser = $db->prepare("INSERT INTO `user`(`password`, `username`, `lastname`, `mail`, `phone`, `birthdate`) VALUES (':password',':username',':lastname',':mail',':phone',':birthdate')");
    $reqAddUser->bindParam('username', $username, PDO::PARAM_STR);
    $reqAddUser->bindParam('password', $password, PDO::PARAM_STR);
    $reqAddUser->bindParam('lastname', $lastname, PDO::PARAM_STR);
    $reqAddUser->bindParam('mail', $mail, PDO::PARAM_STR);
    $reqAddUser->bindParam('phone', $phone, PDO::PARAM_STR);
    $reqAddUser->bindParam('birthdate', $birthdate, PDO::PARAM_STR);
    $reqAddUser->execute();
}
?>
<hr />
<!--C R U D : Update -->
<?php
/*$id = $_GET['id'];
$reqUser = $db->prepare('SELECT `id_user`, `password`, `username`, `lastname`, `mail`, `phone`, `birthdate` FROM `user` WHERE `id_user` = :id');
$reqUser->bindParam('id', $id, PDO::PARAM_INT);
$reqUser->execute();
$resultUser = $reqUser->fetchAll(PDO::FETCH_ASSOC);

//while ($user = $reqUser->fetchAll(PDO::FETCH_ASSOC)) {
?>
<!-- Insérer formulaire ici-->
        <?php
        /*if (isset($_POST['submit'])) {
            $id = $_GET['id'];
            $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $lastname = addslashes($_POST['lastname']);
    $mail = addslashes($_POST['mail']);
    $phone = addslashes($_POST['phone']);
    $birthdate = addslashes($_POST['birthdate']);

    $reqUserUpdate = $db->prepare("UPDATE `user` SET `password`=':password',`username`=':username',`lastname`=':lastname',`mail`=':mail',`phone`=':phone',`birthdate`=':birthdate' WHERE `id_user` = :id");
    $reqUserUpdate->bindParam('id', $id, PDO::PARAM_INT);
    $reqUserUpdate->bindParam('username', $username, PDO::PARAM_STR);
    $reqUserUpdate->bindParam('password', $password, PDO::PARAM_STR);
    $reqUserUpdate->bindParam('lastname', $lastname, PDO::PARAM_STR);
    $reqUserUpdate->bindParam('mail', $mail, PDO::PARAM_STR);
    $reqUserUpdate->bindParam('phone', $phone, PDO::PARAM_STR);
    $reqUserUpdate->bindParam('birthdate', $birthdate, PDO::PARAM_STR);PDO::PARAM_STR);
    $reqUserUpdate->execute();
        }
        */ ?>
<?php
//} //PENSER A FERMER LA BOUCLE LA
?>


<!--C R U D : Delete -->
<?php
/*session_start();
try{
    require_once '../connexion.php';
    $id = $_GET['id'];
    $reqdel = $db->prepare("DELETE FROM `user` WHERE `id_user` = :id");
    $reqdel->bindParam('id',$id, PDO::PARAM_INT);
    $reqdel->execute();
    $_SESSION["success"] = "Votre user à bien été supprimé";
    header('Location: ');
    exit();
}catch (PDOException $e){
    $_SESSION["error"] = "Votre user n'a pas été supprimé";
    header('Location: ');
    exit();
}
*/ ?>

<hr />