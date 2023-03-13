<?php 
    include './header-admin.php';

?>

    <h1 class="multiTitre">listes user</h1>

    <div id="userMenu">
        <form class="userSearch" action="" method="post">
            <input class="recherche" type="search" name="recherche"  placeholder="rechercher user" >
            <button><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
        </form>
        <form class="boutonUser">
            <button><a href="#">modifier</a></button>
            <button><a href="#">supprimer</a></button>
        </form>
    </div>

<table id="tableUser">
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Lastname</th>
      <th>Mail</th>
      <th>password</th>
      <th>phone</th>
      <th>birthday</th>
      <th>created at</th>
      <th>statut</th>
      <th>select</th>
    </tr>
  </thead>
  <tbody>
    <tr>
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