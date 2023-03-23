// Récupération de l'élément HTML où les livres seront affichés
let container = document.querySelector('.container-books');

// Récupération des données des livres depuis le serveur
fetch('../front/resultats.php')
    .then(response => response.json())
    .then(data => {
        // Pour chaque livre, création d'un élément HTML
        data.forEach(book => {
            let bookElement = document.createElement('div');
            bookElement.classList.add('books-catalog');
            bookElement.innerHTML = `
        <div class="item4">
          <a href="./book.php?id=${book.id_book}">
            <img src="../image/${book.image}" alt="${book.title}">
          </a>
          <p class="titles">${book.title}</p>
          <p class="authors">${book.author}</p>
        </div>
      `;
            // Ajout de l'élément HTML dans le conteneur
            container.appendChild(bookElement);
        });
    });



const genreButtons = document.querySelectorAll('.genre-btn');
genreButtons.forEach(button => {
    button.addEventListener('click', () => {
        const genre = button.getAttribute('data-genre');
        fetch(`./filter.php?genre=${genre}`)
            .then(response => response.text())
            .then(result => {
                const containerBooks = document.querySelector('.container-books');
                containerBooks.innerHTML = result;
            });
    });
});

