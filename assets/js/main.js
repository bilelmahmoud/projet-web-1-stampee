// import FiltreCondition from "./FiltreCondition.js";
// import FiltrePrix from "./filtrePrix.js";
import FiltreComplet from "./filtreComplet.js";

document.addEventListener('DOMContentLoaded', function() {
    // let filtreConditionInstance = new FiltreCondition();
    //  let FiltrePrixInstance = new FiltrePrix();
    new FiltreComplet();
    console.log(FiltreComplet)
    
});

// afficherConditions() {
//     // Récupérer les valeurs des cases cochées
//     const prixSelectionnes = Array.from(this.prixCheckboxes)
//         .filter(checkbox => checkbox.checked)
//         .map(checkbox => checkbox.name);

//     // Filtrer les enchères en fonction des prix sélectionnés
//     const encheresFiltreesPrix = this.encheres.filter(enchere => {
//         return prixSelectionnes.length === 0 || prixSelectionnes.includes(enchere.categorie_prix);
//     });

//     // Mettre à jour le contenu
//     this.conditionsContainer.innerHTML = this.construireDom(encheresFiltreesPrix);
// }