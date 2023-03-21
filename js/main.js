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


