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
        $query = $db->prepare('SELECT  `book`.`id_book`, `book`.`ISBN`, `book`.`image`, `book`.`title`, `book`.`author`, `book`.`editor`, `book`.`collection`, `book`.`publication_date`, `book`.`genre`, `book`.`id_category`, `book`.`summary`, `book`.`status`, `genre`.`libel_genre` FROM `book` INNER JOIN `genre_book` ON `genre_book`.`id_book` = `book`.`id_book` INNER JOIN `genre` ON `genre`.`id_genre` = `genre_book`.`id_genre`
        WHERE `title`  LIKE :search OR `author` LIKE :search OR `ISBN` LIKE :search OR `libel_genre` LIKE :search');

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
