<?php
require_once '../connexion.php';
include './header-admin.php';
// $id = $_GET['id'];
// $req = $db->prepare('SELECT `id_genre`, `libel_genre` FROM `genre`');
// $req->execute();
// $result = $req->fetchAll(PDO::FETCH_ASSOC);
// 
?>

<?php
// $req = $db->prepare("SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id");
// $req->bindParam('id', $id, PDO::PARAM_INT);
// $req->execute();

// while ($book = $req->fetch(PDO::FETCH_ASSOC)) {
// 
?>
<!-- <h2>Cocher catégories a ajouter au produit : "<?= $book['title'] ?>", édition : <?= $book['editor'] ?></h2> -->
<!-- <?php
     // }
     ?>
// <form action="" method="post">
//     <table>
//         <thead>
//             <th>ID</th>
//             <th>Nom</th>
//         </thead>

//         <tbody>
//             <?php
               //             foreach ($result as $genre) {
               //             
               ?>
//                 <tr>
//                     <td><input type="checkbox" value="<?= $genre['id_genre'] ?>" name="check_list[]"><?= $genre['id_genre'] ?></td>
//                     <td><?= $genre['libel_genre'] ?></td>
//                 </tr>
//             <?php
               //             }
               //             
               ?>
//         </tbody>
//     </table>
//     <button type="submit" value="submit" name="submit">submit</button>
//     <?php
          //     session_start();
          //     if (isset($_POST['submit'])) {
          //         if (!empty($_POST['check_list'])) {
          //             foreach ($_POST['check_list'] as $id_genre) {
          //                 $id = $_GET['id'];
          //                 $req = "INSERT INTO `genre_book`(`id_book`, `id_genre`) VALUES ('$id','$id_genre')";
          //                 $db->query($req);

          //                 header('Location: ./article.php');
          //             }
          //         } else {
          //             echo "<b> Please select at least one option !</b>";
          //         }
          //     }
          //     
          ?>
// </form> -->


<h1 class="multiTitre">modifications catégories</h1>

<div id="ajout-genre">
     <form action="" method="post">
          <div class="ajout">
               <input class="recherche" type="search" name="recherche" placeholder="nouveau genre">
               <button><a href="./add.php">ajouter</a></button>
          </div>

          <div class="modifierSupp">
               <select name="id_category" id="id_category">
                    <option value="">selectionner</option>
                    <option value="action">action</option>
                    <option value="aventure">aventure</option>
                    <option value="drame">drame</option>
                    <option value="fantasie">fantasie</option>
                    <option value="historique">historique</option>
                    <option value="horreur">horreur</option>
                    <option value="policier">policier</option>
                    <option value="romance">romance</option>
                    <option value="science-fiction">science-fiction</option>
                    <option value="thriller">thriller</option>
               </select>

               <input class="recherche" type="search" name="recherche" placeholder="">
               <button><a href="./add.php">modifier</a></button>
               <button><a href="./add.php">supprimer</a></button>
          </div>
     </form>

</div>

<?php include './includeClose.php'  ?>