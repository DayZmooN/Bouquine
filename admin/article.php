<?php
require_once '../connexion.php';
include './header-admin.php';

$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` ORDER BY `id_book` DESC');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="multiTitre">menus articles</h1>


<div id="articleSearchAjout">
    <form action="" method="post">
        <input class="recherche" type="search" name="recherche" placeholder="rechercher directement un ouvrage">
        <button><img src="../image/loupe.png" alt="loupe clicable pour lancer la recherche" title="lancer la recherche"></button>
    </form>
    <a href="./articleadd.php">Ajouter de nouveaux livres</a>
</div>


<h2 class="sousTitre">Liste des articles</h2>

<?php
foreach ($result as $article) {
?>
    <div class="articleList">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['publication_date'] ?></p>
        <p><?= $article['author'] ?></p>
        <div id="bouton">

            <a class="btnGreen" href="./articleedit.php?id=<?= $article['id_book'] ?>" style="color:green">Modifier</a>
            <a class="btnRed" href="./deletearticle.php?id=<?= $article['id_book'] ?>" style="color:red">Supprimer</a>
            <a href="./coverupload.php?id=<?= $article['id_book'] ?>">Cover</a>
            <a href="./articlelinkgenre?id=<?= $article['id_book'] ?>">Genres</a>

        </div>
    </div>
<?php } ?>
</body>

<link rel="stylesheet" href="../css/style-admin.css">
<div class="popup">
    <h1>Voulez-vous supprimer définitivement :</h1>

    <div class="title">ici le php qui fera apparaitre le titre </div>
    <button class="btnYes">yes</button>
    <button class="btnNo">no</button>
</div>

<?php include './includeClose.php'; ?>