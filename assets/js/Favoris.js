
// export default class Favoris {
//     constructor() {
        
//         this.elBoutonFavoris = document.querySelector('[data-js-favoris]');
//         console.log(this.elBoutonFavoris)
//         this.init();
//     }

//     init() {
      

//         if (this.elBoutonFavoris) {
//             this.elBoutonFavoris.addEventListener('click', function() {
//                 this.toggleFavoris();
//                 // console.log('Clic');
//             }.bind(this));
//         }
//     }

   
//     toggleFavoris() {
//         // Utilisez fetch pour envoyer une requête POST au serveur
//         fetch('/projet-stampee/controller/ControllerEnchere.php/toggleFavoris', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//             body: JSON.stringify({ enchere_id: this.enchereId }),
            
//         })
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Réponse du serveur non valide');
//             }
//             return response.json();
//         })
//         .then(data => {
//             // Mettez à jour l'icône du favori côté client en fonction de la réponse du serveur
//             if (data.isFavori) {
//                 this.elBoutonFavoris.classList.add('favori');
//             } else {
//                 this.elBoutonFavoris.classList.remove('favori');
//             }

//             // Affichez un message à l'utilisateur
//             alert(data.message);
//         })
//         .catch(error => {
//             console.error('Erreur fetch :', error);
//         });
//     }
// }

