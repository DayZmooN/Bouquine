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
  <form class="boutonUser">
    <button><a href="#">supprimer</a></button>
  </form>
</div>

<table id="tableUser">
  <thead>
    <tr>
      <th>id</th>
      <th>Pseudo</th>
      <th>E-mail</th>
      <th>MDP</th>
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

        <td><input type="checkbox" id="check-all" name="check-all"></td>
      <?php
    }
      ?>
      </tr>


  </tbody>
</table>