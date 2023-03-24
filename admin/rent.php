<?php
require_once './auth.php';
include_once './header-admin.php';

$id = $_GET['id'];
$req = $db->prepare('SELECT `loan`.`id_loan`, `loan`.`id_book`, `loan`.`id_user`, `loan`.`loan_date`, `loan`.`return_date`,`user`.`username`,`book`.`ISBN`, `book`.`image`, `book`.`title`, `book`.`author`, `book`.`editor`, `book`.`collection`, `book`.`publication_date`, `book`.`genre`, `book`.`id_category`, `book`.`summary`, `book`.`status`
FROM `loan`
INNER JOIN `user` ON `loan`.`id_user` = `user`.`id_user`
INNER JOIN `book` ON `loan`.`id_book` = `book`.`id_book`
WHERE `user`.`id_user` = :id AND `book`.`status` = 0');
$req->bindParam('id', $id, PDO::PARAM_INT);
$req->execute();
$rent = $req->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['rented'])) {
    $id_loan = $_POST['id_loan'];
    $return_date = date('Y-m-d H:i:s', strtotime('+15 days'));
    $rented = $db->prepare('UPDATE `loan` SET `return_date`=:return_date WHERE `id_loan` = :id_loan');
    $rented->bindParam(':return_date', $return_date, PDO::PARAM_STR);
    $rented->bindParam(':id_loan', $id_loan, PDO::PARAM_INT);
    $rented->execute();
}

if (isset($_POST['cancelled'])) {
    $id_loan = $_POST['id_loan'];
    $statusUpdate = $db->prepare("UPDATE `book` SET `status`='1' WHERE `id_book` IN (SELECT `id_book` FROM `loan` WHERE `id_loan` = :id_loan)");
    $statusUpdate->bindParam(':id_loan', $id_loan, PDO::PARAM_INT);
    $statusUpdate->execute();
}
?>
<section class="userLoan">

    <div id="UserInfo">
        <?php foreach ($rent as $loan) { ?>
            <h2>Liste des emprunts de l'utilisateur : <?= $loan['username'] ?></h2>
    </div>

    <div id="rentedBook">
        
        <div id="bookDits">
            <p><?= $loan['title'] ?></p>
        </div>

        <div id="btnRentAdmin">
            <form class="rentForm" action="" method="post">
                <input type="hidden" name="id_loan" value="<?= $loan['id_loan'] ?>">
                <input class="inputRent" type="submit" name="rented" value="Rented">
                <input class="inputRent" type="submit" name="cancelled" value="Cancel">
            </form>
        </div>

    </div>
<?php } ?>
</section>