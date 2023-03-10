<?php
require_once '../connexion.php';
$id = $_GET['id'];
$req = $db->prepare('SELECT `id_genre`, `libel_genre` FROM `genre`');
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
$req = $db->prepare("SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `id_book` = :id");
$req->bindParam('id', $id, PDO::PARAM_INT);
$req->execute();

while ($book = $req->fetch(PDO::FETCH_ASSOC)) {
?>
    <h2>Cocher catégories a ajouter au produit : "<?= $book['title'] ?>", édition : <?= $book['editor'] ?></h2>
<?php
}
?>
<form action="" method="post">
    <table>
        <thead>
            <th>ID</th>
            <th>Nom</th>
        </thead>

        <tbody>
            <?php
            foreach ($result as $genre) {
            ?>
                <tr>
                    <td><input type="checkbox" value="<?= $genre['id_genre'] ?>" name="check_list[]"><?= $genre['id_genre'] ?></td>
                    <td><?= $genre['libel_genre'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <button type="submit" value="submit" name="submit">submit</button>
    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['check_list'])) {
            foreach ($_POST['check_list'] as $id_genre) {
                $id = $_GET['id'];
                $req = "INSERT INTO `genre_book`(`id_book`, `id_genre`) VALUES ('$id','$id_genre')";
                $db->query($req);
            }
        } else {
            echo "<b> Please select at least one option !</b>";
        }
        ?>
    </tbody>
</table>
<button type="submit" value="submit" name="submit">submit</button>
<?php
session_start();
if(isset ($_POST['submit'])){
    if(!empty($_POST['check_list'])){
        foreach($_POST['check_list'] as $id_genre){
        $id = $_GET['id'];
        $req = "INSERT INTO `genre_book`(`id_book`, `id_genre`) VALUES ('$id','$id_genre')";
        $db->query($req);

        header('Location: ./article.php');
        }
    }else {
        echo "<b> Please select at least one option !</b>";
    }
    ?>
</form>