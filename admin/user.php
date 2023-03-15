<?php
include './header-admin.php';
require_once './auth.php';
$reqAdmin = $db->prepare('SELECT `id_admin`, `username`, `password`, `mail` FROM `admin`');
$reqAdmin->execute();
$resultAdmin = $reqAdmin->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">liste Admins</h1>

    <div id="userMenu">
        <form class="userSearch" action="" method="post">
            <input class="recherche" type="search" name="recherche"  placeholder="rechercher user" >
            <button><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
        </form>
        <form class="boutonUser">
            <button><a href="./modifUser.php">modifier</a></button>
            <button><a href="#">supprimer</a></button>
        </form>
    </div>

<table id="tableUser">
  <thead>
    <tr >
      <th>id</th>
      <th>Pseudo</th>
      <th>E-mail</th>
      <th>MDP</th>
    </tr>
  </thead>
  <tbody>
    <tr class="contenuUser">
      <td>1</td>
      <td>Karim</td>
      <td>devlead</td>
      <td>Karimdu01@gmail.fr</td>
      <td>nxO4GDWfOXT3X3sAMozLOOSFA7RCnAbcpdFm3w20Czy30ZkhqEefS</td>
      <td>0606060606</td>
      <td>1990/01/01</td>
      <td>2022/12/14</td>
      <td>en ligne</td>
      <td><input type="checkbox" id="check-all" name="check-all"></td>

    </tr>

    
  </tbody>
</table>











<?php include './includeClose.php'; ?>