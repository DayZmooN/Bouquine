<?php
require_once './auth.php';

$query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book`');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div id="menu-recherche-article">
    <h2>liste des articles</h2>
</div>
<?php
foreach ($result as $article) {
?>
<table>
    <tbody>
        <tr>
            <td><h3><?= $article['title'] ?></h3></td>
            <td><p><?= $article['publication_date'] ?></p></td>
            <td><p><?= $article['author'] ?></p></td>
            <br>
            <td><a href="./book.php?id=<?= $article['id_book'] ?>">Voir</a></td>
        </tr>
    </tbody>
</table>

<?php } ?>