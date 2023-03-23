<?php
require_once '../auth.php';

// Initialiser les variables de recherche
$search_term = '';
$search_results = [];

// Vérifier si le formulaire a été soumis
if (isset($_GET['submit'])) {
    // Valider le terme de recherche
    $search_term = trim($_GET['search']);
    if (empty($search_term)) {
        // Afficher une erreur si le terme de recherche est vide
        echo "<p>Veuillez saisir un terme de recherche valide</p>";
    } else {
        // Préparer la requête SQL
        $query = $db->prepare('SELECT DISTINCT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status`
        FROM `book`
        INNER JOIN `genre_book`
        ON `genre_book`.`id_book` = `book`.`id_genre`
        INNER JOIN `genre`
        ON `genre`.`id_genre` = `genre_book`.`id_genre`
        WHERE `title` LIKE :search OR `author` LIKE :search OR `ISBN` LIKE :search OR `libel_genre` LIKE :search;');

        $search_term = "%{$search_term}%"; // Ajouter à la recherche
        $query->bindParam(':search', $search_term, PDO::PARAM_STR);
        // Exécuter la requête SQL et récupérer les résultats
        if ($query->execute()) {
            $search_results = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Afficher une erreur si la requête SQL échoue 
            echo "<p>Une erreur est survenue lors de la recherche</p>";
        }
    }
}
