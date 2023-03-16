<?php
include './header-admin.php';
require_once './auth.php';
$reqUser = $db->prepare('SELECT `id_user`, `password`, `username`, `lastname`, `mail`, `phone`, `birthdate` FROM `user`');
$reqUser->execute();
$resultUser = $reqUser->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">liste users</h1>

<div id="userMenu">
  <form class="userSearch" action="" method="post">
    <input class="recherche" type="search" name="recherche" placeholder="rechercher user">
    <button><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
  </form>

</div>

<table id="tableUser">
  <thead>
    <tr>
      <th>id</th>
      <th>username</th>
      <th>lastname</th>
      <th>mail</th>
      <th>phone</th>
      <th>birthday</th>
      <th>created at</th>
      <th>statut</th>
      <th>action</th>

    </tr>
  </thead>
  <tbody>

    <?php
    foreach ($resultUser as $user) {
    ?>
      <tr class="contenuUser">
        <td><?= $user['id_user'] ?></td>
        <td><?= $user['username'] ?></td>
        <td><?= $user['lastname'] ?></td>
        <td><?= $user['mail'] ?></td>
        <td><?= $user['password'] ?></td>
        <td><?= $user['phone'] ?></td>
        <td><?= $user['birthdate'] ?></td>
        <td>en ligne</td>
      <td><a class="btnRed" href="./delete-user.php?id=<?= $user['id_user'] ?>" style="color:red">supprimer</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php include './includeClose.php'; ?>