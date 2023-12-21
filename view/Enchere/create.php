{{ include('header.php', {title: 'Enchère Create'}) }}
<body>
    <div class="container">
        <form class="form-membre" action="{{ path }}enchere/store" method="post" enctype="multipart/form-data">
            <span class="text-danger">{{ errors | raw }}</span>

            <label for="timbre_id">Sélectionner un timbre
            <select name="timbre_id">
                <option value="">Sélectionner un timbre</option>
                {% for timbre in timbres %}
                    <option value="{{ timbre.id }}">{{ timbre.nom }}</option>
                {% endfor %}
            </select>
            </label>

            <label>Date de début
                <input type="datetime-local" name="date_debut">
            </label>

            <label>Date de fin
                <input type="datetime-local" name="date_fin">
            </label>

            <label>Prix de départ
                <input type="number" name="prix">
            </label>

            <label>Couleur de la bordure
                <input type="checkbox" name="coeur_lord" value="1"> <!-- valeur 1 pour true, 0 pour false -->
            </label>

            <!-- Ajoutez d'autres champs selon vos besoins -->

            <input type="submit" value="Save" class="btn">
        </form>
    </div>
</body>
</html>

{{ include('footer.php', {title: 'Home'}) }}