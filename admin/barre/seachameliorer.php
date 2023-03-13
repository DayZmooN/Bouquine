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
        $query = $db->prepare('SELECT `id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status` FROM `book` WHERE `title` LIKE :search OR `author` LIKE :search OR `ISBN` LIKE :search');
        $search_term = "%{$search_term}%"; // Ajouter des wildcards à la recherche
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
?>

<!-- Afficher le formulaire de recherche -->
<form action="" method="get">
    <input type="search" name="search" id="seach" value="<?php echo htmlspecialchars($search_term); ?>">
    <button type="submit" name="submit">Envoyer</button>
</form>

<!-- Afficher les résultats de la recherche -->
<?php if (!empty($search_results)) : ?>
    <?php foreach ($search_results as $book) : ?>
        <p><?php echo htmlspecialchars($book['title']); ?></p>
        <img src="<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>">
    <?php endforeach; ?>
<?php endif; ?>

<!-- Afficher un message si aucun résultat n'a été trouvé -->
<?php if (isset($_GET['submit']) && empty($search_results)) : ?>
    <p>Aucun livre trouvé pour ce terme de recherche</p>
<?php endif; ?>