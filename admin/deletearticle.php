<?php
try {
    require_once './auth.php';

    if (isset($_GET['id'])) {
        // Récupérer l'ID de l'article à supprimer
        $id = $_GET['id'];

        // Supprimer les enregistrements associés dans la table genre_book
        $query = $db->prepare('DELETE FROM genre_book WHERE id_book = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        // Supprimer les enregistrements associés dans la table loan
        $query = $db->prepare('DELETE FROM loan WHERE id_book = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        // Supprimer l'article
        $query = $db->prepare('DELETE FROM book WHERE id_book = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        // Rediriger l'utilisateur vers la page des articles
        header('Location: ./article.php');
        // Afficher la modal si la suppression a réussi
        echo "<script>showSuccessModal();</script>";
    }
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();

    $_SESSION["error"] = "Votre article n'a pas été supprimé";
    // header('Location: ./dashboard-admin.php');
    exit();
}
