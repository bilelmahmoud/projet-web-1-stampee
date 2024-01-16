// export default class FiltreCondition {
//     constructor() {
//         this.checkboxes = document.querySelectorAll('[data-js-condition] input[type="checkbox"]');
//         this.conditionsContainer = document.querySelector('[data-js-produit]');
//         this.encheres = JSON.parse(document.getElementById('encheres-data').textContent);
        

//         this.checkboxes.forEach(checkbox => {
//             checkbox.addEventListener('change', this.afficherConditions.bind(this));
//         });

//         this.afficherConditions(); // Afficher les conditions lors du chargement initial
//     }

//     afficherConditions() {
//         // Vérifier si toutes les cases à cocher sont décochées
//         const toutesDecochees = Array.from(this.checkboxes).every(checkbox => !checkbox.checked);

//         // Filtrer les enchères en fonction des conditions sélectionnées
//         const conditionsSelectionnees = Array.from(document.querySelectorAll('[data-js-condition] input[type="checkbox"]:checked')).map(checkbox => checkbox.name);

//         const encheresFiltrees = toutesDecochees ? this.encheres : this.encheres.filter(enchere => conditionsSelectionnees.includes(enchere.condition_nom));

//         // Construire le contenu dynamique avec les enchères filtrées
//         let dom = '';

//         encheresFiltrees.forEach(enchere => {
//             dom += `
//                 <article data-js-produit class="aritcle-1 condition-aritcle-1">
//                     <div class="infos-image">
//                         <img src="http://localhost/projet-stampee/uploads/${enchere.image_nom}" alt="Image du timbre">
//                     </div>
//                     <div class="infos-secondaires">
//                         <div class="infos-secondaires-box"> 
//                             <p>nom du timbre</p>
//                             <p><span class="info-span">${enchere.nom}</span></p>
//                         </div>
//                         <div class="infos-secondaires-box"> 
//                             <p>prix</p>
//                             <p><span class="info-span">${enchere.prix} $ </span></p>
//                         </div>
//                         <div class="infos-secondaires-box"> 
//                             <p>pays</p>
//                             <p><span class="info-span">${enchere.pays}</span></p>
//                         </div>
//                         <div class="infos-secondaires-box"> 
//                             <p>condition </p>
//                             <p><span class="info-span">${enchere.condition_nom}</span></p>
//                         </div>
//                         <div>
//                         <a href="../Enchere/show/${enchere.id}" class="bouton-personnalise">Miser</a><br>
//                         </div>
//                     </div>
//                 </article>
//             `;
//         });

//         // Mettre à jour le contenu
//         this.conditionsContainer.innerHTML = dom;
//     }
// }