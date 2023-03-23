// // appelle asynchrone
// // on va recupere le formulaire et on lui met  a addEventListener POUR Evenement submit
// document.getElementById("inscription").addEventListener("submit", function (e) {
//     e.preventDefault();


//     // REQUETTE ASYNCHRONE
//     //on cree un object a partir de cette classe javascript
//     var xhr = new XMLHttpRequest();

//     // verifier quand on a un changement etat
//     xhr.onreadystatechange = function () {
//         //si la requette a bien etait envoyer
//         if (this.readyState == 4 && this.status == 200); {
//             console.log(this.response);
//         } if (this.readyState == 4) {
//             alert("une erreur est survenue...");

//         }

//     };

//     //initialiser la requette asynchrone on true pour faire une requette asynchrone
//     xhr.open("GET", "../model/connexion.php", true);
//     // xhr.send() sert a envoyer ta requette
//     xhr.send();


//     //POUR EVITER LE COMPORTEMENT PAR DEFAUT
//     return false;
// })


// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the message element
var message = document.getElementById("message");

function toggleModal() {
  if (message.innerHTML.trim() !== "") {
    modal.style.display = "block"; // Display the modal
    setTimeout(function() {
      modal.style.display = "none"; // Hide the modal after 3 seconds
    }, 3000);
  }
}

// Call the toggleModal function when the page is loaded
window.addEventListener("load", toggleModal);

// When the user clicks on <span> (x), close the modal
span.addEventListener("click", function() {
  modal.style.display = "none";
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener("click", function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});








  




