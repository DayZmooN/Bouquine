document.addEventListener('DOMContentLoaded', function () {
    let btnRss = document.querySelectorAll('.btnRed');
    let body = document.querySelector('body');

    for (const btnR of btnRss) {
        btnR.addEventListener('click', function (event) {
            event.preventDefault(); // Ajouté pour empêcher le comportement par défaut du lien

            let dataIdBook = this.dataset.idbook;
            let dataTitle = this.dataset.title;
            document.body.style.overflow = "hidden";

            let modalBg = document.createElement('div');
            modalBg.classList.add('block-modal');
            body.append(modalBg);

            const boxDelete = document.createElement("div");
            boxDelete.setAttribute("id", "box-delete-book");
            boxDelete.classList.add("active-box-delete-book");
            body.append(boxDelete);

            //p static
            const confirmation = document.createElement("p");
            confirmation.setAttribute("id", "txt-box-delete-category");
            boxDelete.appendChild(confirmation);
            confirmation.innerHTML = `Êtes-vous sûr de vouloir supprimer ${dataTitle} ? `;

            //popup
            const btnCancel = document.createElement("a");
            btnCancel.setAttribute("id", "btn-cancel-delete-category");
            boxDelete.appendChild(btnCancel);
            btnCancel.innerHTML = "Annuler";

            //close modal
            btnCancel.addEventListener('click', function () {
                document.body.style.overflow = "auto";
                boxDelete.remove();
                modalBg.remove();
            })

            const btnConfirmed = document.createElement("a");
            btnConfirmed.setAttribute("id", "btn-confirmed-delete-book");

            if (window.location.href.includes("category.php")) {
                deleteUrl = "./deletecategory.php?id=" + dataIdBook;
            } else if (window.location.href.includes("genre.php")) {
                deleteUrl = "./deletegenre.php?id=" + dataIdBook;
            }
            else if (window.location.href.includes("article.php")) {
                deleteUrl = "./deletearticle.php?id=" + dataIdBook;
            }
            else if (window.location.href.includes("dashboard-admin.php")) {
                deleteUrl = "./deletearticle.php?id=" + dataIdBook;
            } else if (window.location.href.includes("user.php")) {
                deleteUrl = "./delete-user.php?id=" + dataIdBook;
            }
            btnConfirmed.setAttribute("href", deleteUrl);

            // sa permet de définir dynamiquement l'URL de suppression en fonction de la page actuelle. Ainsi, lorsque vous cliquez sur le bouton de confirmation, il envoie la demande de suppression à la bonne URL.

            boxDelete.appendChild(btnConfirmed);
            btnConfirmed.innerHTML = "Confirmer";

            btnConfirmed.addEventListener('click', function (event) {
                event.preventDefault();
                deleteBook(dataIdBook);
            });

            function deleteBook(id) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "./admin/delete-book.php", true);
                xhr.setRequestHeader("Content-Type", "./admin/article.php");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Si la suppression réussit, afficher la modal de succès
                            showSuccessModal();
                        } else {
                            // Si la suppression échoue, afficher un message d'erreur
                            alert("Erreur lors de la suppression du livre.");
                        }
                    }
                };
                xhr.send(`id=${id}`);
            }
        });
    }
});

function showSuccessModal() {
    // Récupérer le corps du document
    function showSuccessModal() {
        // Récupérer le corps du document
        const body = document.querySelector('body');

        // Créer une div pour la fenêtre modale
        const modal = document.createElement('div');
        modal.classList.add('modal');

        // Créer une div pour le contenu de la fenêtre modale
        const modalContent = document.createElement('div');
        modalContent.classList.add('modal-content');

        // Ajouter le texte de succès dans la fenêtre modale
        const successText = document.createElement('p');
        successText.textContent = 'Opération effectuée avec succès !';
        modalContent.appendChild(successText);

        // Ajouter le bouton de fermeture de la fenêtre modale
        const closeButton = document.createElement('button');
        closeButton.classList.add('close-button');
        closeButton.textContent = 'Fermer';
        closeButton.addEventListener('click', () => {
            modal.remove();
        });
        modalContent.appendChild(closeButton);

        // Ajouter le contenu de la fenêtre modale à la div modale
        modal.appendChild(modalContent);

        // Ajouter la div modale au corps du document
        body.appendChild(modal);
    }
}
