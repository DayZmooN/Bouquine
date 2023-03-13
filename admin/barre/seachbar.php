<?php
require_once '../auth.php';
?>

<form action="" method="get">
    <input type="search" name="search" id="seach">
    <button type="submit" name="submit">Envoyer</button>
</form>

<?php
if (isset($_GET['submit'])) {
    $search_term = $_GET['search'];
    $query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `title` LIKE :search OR `author` LIKE :search OR `ISBN` LIKE :search');
    $query->bindValue(':search', "%$search_term%", PDO::PARAM_STR);
    $query->execute();
    $search_results = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($search_results as $book) {
        echo "<p>{$book['title']}</p>";
        echo "<p>{$book['image']}</p>";
    }
}
?>