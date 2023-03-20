// // JavaScript pour afficher la modal avec un message d'erreur
// function showErrorModal(message) {
//     // Récupère la modal et le message
//     const modal = document.getElementById("modal");
//     const modalMessage = document.getElementById("modal-message");

//     // Affiche le message dans la modal
//     modalMessage.innerText = message;

//     // Affiche la modal
//     modal.style.display = "block";

//     // Ajoute un événement pour fermer la modal lorsque l'utilisateur clique sur le bouton de fermeture
//     const closeButton = document.getElementsByClassName("close")[0];
//     closeButton.onclick = function () {
//         modal.style.display = "none";
//     }

//     // Ajoute un événement pour fermer la modal lorsque l'utilisateur clique en dehors de la modal
//     window.onclick = function (event) {
//         if (event.target == modal) {
//             modal.style.display = "none";
//         }
//     }
// }


// document.addEventListener('DOMContentLoaded', function () {
//     showModal("Message d'erreur");
// });

// function showModal(message) {
//     const modal = document.getElementById("myModal");
//     const modalContent = document.getElementById("modal-content");
//     modalContent.innerText = message;
//     modal.style.display = "none ";
//     const span = document.getElementsByClassName("close")[0];
//     span.onclick = function () {
//         modal.style.display = "block";
//     }
//     window.onclick = function (event) {
//         if (event.target == modal) {
//             modal.style.display = "none";
//         }
//     }
// }
// showErrorModal("Votre article n'a pas été supprimé");


