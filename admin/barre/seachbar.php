<?php
require_once '../auth.php';
?>
<?php
//barre de recherche

if (isset($_GET['search'])) {
    $search_term = $_GET['search'];
    $query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `title` LIKE :search OR `author` LIKE :search OR `ISBN` LIKE :search');
    $query->bindValue(':search', "%$search_term%", PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
