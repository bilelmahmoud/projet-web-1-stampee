{{ include('header.php', {title: 'timbre Edit'}) }}
<body>
    <div class="container">
        

        <form class="form-membre" action="{{path}}timbre/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{{timbre.id}}">
   
            <label>nom
                <input type="text" name="nom" value="{{timbre.nom}}">
            </label>

            <label>date de creation
                <input type="date" name="date_creation" value="{{timbre.date_creation}}">
            </label>

            <label>couleur
                <input type="text" name="couleur" value="{{timbre.couleur}}">
            </label>

            <label>tirage
                <input type="number" name="tirage" value="{{timbre.tirage}}">
            </label>
            
            <label>dimensions
                <input type="text" name="dimensions" value="{{timbre.dimensions}}">
            </label>

            <label for="certifie">Certifié</label>
            <select name="certifie" id="certifie">
                <option value="1" {% if timbre.certifie == 1 %}selected{% endif %}>Oui</option>
                <option value="0" {% if timbre.certifie == 0 %}selected{% endif %}>Non</option>
            </select>

            <label for="pays">Pays</label>
            <input type="text" name="pays" id="pays" value="{{timbre.pays}}">
                   
            <label for="condition_timbre_id">Condition
                    <select name="condition_timbre_id" id="condition_timbre_id">
                        <option value="">Sélectionner une condition</option>
                        {% for condition in conditions %}
                            <option value="{{ condition.id }}" {% if condition.id == timbre.condition_timbre_id %}selected{% endif %}>
                                {{ condition.nom }}
                            </option>
                        {% endfor %}
                    </select>

            </label>

            <label> photo 

         
            <input type="file" name="photo" id="fileToUpload">
            <!-- <input type="hidden" name="nom" value="upload photo"> -->
            
             
            </label>   

          
            <input type="submit" value="save" class="btn">
        </form>
    </div>
</body>
</html>

{{ include('footer.php', {title: 'Home'}) }} 