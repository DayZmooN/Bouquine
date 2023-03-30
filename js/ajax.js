// ajax created by dayzmoon
// Récupération de l'élément HTML où les livres seront affichés
let container = document.querySelector('.container-books');

// Récupération des données des livres depuis le serveur
fetch('../front/resultats.php')
    .then(result => result.json())
    .then(data => {
        // Pour chaque livre, création d'un élément HTML
        data.forEach(book => {
            const div = document.createElement('div');
            div.className = 'books-catalog';
            const item4 = document.createElement('div');
            item4.className = 'item4';
            const link = document.createElement('a');
            link.href = `../front/book.php?id=${book.id_book}`;
            const img = document.createElement('img');
            img.src = `../image/${book.image}`;
            img.alt = book.title;
            link.appendChild(img);
            const title = document.createElement('p');
            title.className = 'titles';
            title.textContent = book.title;
            const author = document.createElement('p');
            author.className = 'authors';
            author.textContent = book.author;
            item4.appendChild(link);
            item4.appendChild(title);
            item4.appendChild(author);
            div.appendChild(item4);
            container.appendChild(div);
        });
    });

// Récupération des boutons de genre
// ajax created by dayzmoon
const genreButtons = document.querySelectorAll('.genre-btn');
genreButtons.forEach(button => {
    button.addEventListener('click', () => {
        const genre = button.getAttribute('data-genre');
        fetch(`./filter.php?genre=${genre}`)
            .then(result => result.text())
            .then(result => {
                container.innerHTML = result;
            });

    });
});
