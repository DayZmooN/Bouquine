<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouquine</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="filter">
        <div class="filter-container">
            <h2 class="search-filter">Recherche avancée</h2>

            <form id="filter-form" action="#" method="get">
                <label for="titre">Titre:</label>
                <input type="text" id="titre" name="titre">

                <label for="auteur">Auteur</label>
                <input type="text" id="auteur" name="auteur">

                <label for="Editeur">Editeur</label>
                <input type="text" id="editeur" name="editeur">

                <label for="type document">Type de document</label>
                <input type="text" id="document" name="document">

                <label for="collection">Collection</label>
                <input type="text" id="collection" name="collection">

                <label for="genre">Genre</label>
                <select id="genre" name="genre">
                    <option value="">--Sélectionner--</option>
                    <option value="romance">Romance</option>
                    <option value="action">Action</option>
                    <option value="Fantaisie et fiction">Fantaisie et fiction</option>
                    <option value="Langues étrangères">Langues étrangères</option>
                    <option value="Histoire">Histoire</option>
                    <option value="poesie">Poésie</option>
                </select>

                <label for="annee">Année de publication</label>
                <input type="number" id="annee" name="annee">

                <label for="isbn">ISSN / ISBN / EAN</label>
                <input type="number" id="isbn" name="isbn">

                <input type="submit" value="Rechercher">

            </form>
        </div>
    </section>
</body>

</html>