export default class FiltreComplet {
    constructor() {
        // Vérifier si l'élément 'encheres-data' est présent
        this.encheresDataElement = document.getElementById('encheres-data');
        
        if (this.encheresDataElement) {
            // Si l'élément est présent, continuer avec l'initialisation
            this.encheres = JSON.parse(this.encheresDataElement.textContent);
            this.conditionsContainer = document.querySelector('[data-js-produit]');
            this.prixCheckboxes = document.querySelectorAll('[data-js-prix] input[type="checkbox"]');
            this.conditionCheckboxes = document.querySelectorAll('[data-js-condition] input[type="checkbox"]');

            this.prixCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', this.afficherConditions.bind(this));
            });

            this.conditionCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', this.afficherConditions.bind(this));
            });

            this.afficherConditions(); // Afficher les conditions lors du chargement initial
        }
    }

    afficherConditions() {
        // Récupérer les valeurs des cases cochées pour le filtre de prix
        const prixSelectionnes = Array.from(this.prixCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        // Récupérer les valeurs des cases cochées pour le filtre de condition
        const conditionsSelectionnees = Array.from(this.conditionCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.name);

        // Filtrer les enchères en fonction des prix et des conditions sélectionnés
        const encheresFiltrees = this.encheres.filter(enchere => {
            return this.verifierFourchettePrix(enchere.prix, prixSelectionnes) &&
                   (conditionsSelectionnees.length === 0 || conditionsSelectionnees.includes(enchere.condition_nom));
        });

        // Mettre à jour le contenu
        this.conditionsContainer.innerHTML = this.construireDom(encheresFiltrees);
    }

    verifierFourchettePrix(prixEnchere, prixSelectionnes) {
        if (prixSelectionnes.length === 0) {
            // Si aucun filtre de prix n'est sélectionné, retourner true pour inclure toutes les enchères
            return true;
        }

        // Vérifier si le prix de l'enchère est inclus dans au moins l'une des plages de prix sélectionnées
        return prixSelectionnes.some(fourchette => {
            switch (fourchette) {
                case '200':
                    return prixEnchere >= 0 && prixEnchere <= 200;
                case '400':
                    return prixEnchere > 200 && prixEnchere <= 400;
                case '600':
                    return prixEnchere > 400 && prixEnchere <= 600;
                case '800':
                    return prixEnchere > 800;
                default:
                    return false; // Si la plage de prix n'est pas reconnue, ne pas inclure l'enchère
            }
        });
    }

    construireDom(encheres) {
        let dom = '';

        encheres.forEach(enchere => {
            dom += `
                <article data-js-produit class="aritcle-1 condition-aritcle-1">
                    <div class="infos-image">
                        <img src="http://localhost/projet-stampee/uploads/${enchere.image_nom}" alt="Image du timbre">
                    </div>
                    <div class="infos-secondaires">
                        <div class="infos-secondaires-box"> 
                            <p>nom du timbre</p>
                            <p><span class="info-span">${enchere.nom}</span></p>
                        </div>
                        <div class="infos-secondaires-box"> 
                            <p>prix</p>
                            <p><span class="info-span">${enchere.prix} $ </span></p>
                        </div>
                        <div class="infos-secondaires-box"> 
                            <p>pays</p>
                            <p><span class="info-span">${enchere.pays}</span></p>
                        </div>
                        <div class="infos-secondaires-box"> 
                            <p>condition </p>
                            <p><span class="info-span">${enchere.condition_nom}</span></p>
                        </div>
                        <div>
                            <a href="../Enchere/show/${enchere.id}" class="bouton-personnalise">Miser</a><br>
                        </div>
                    </div>
                </article>
            `;
        });

        return dom;
    }
}
