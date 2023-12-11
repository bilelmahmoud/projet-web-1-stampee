{{ include('header.php', {title: 'timbre Edit'}) }}
<body>
    <div class="container">
        

        <form class="form-membre" action="{{path}}timbre/store" method="post" enctype="multipart/form-data">
   
            <label>nom
                <input type="text" name="nom">
            </label>

            <label>date de creation
                <input type="date" name="date_creation">
            </label>

            <label>couleur
                <input type="text" name="couleur">
            </label>

            <label>tirage
                <input type="number" name="tirage">
            </label>
            
            <label>dimensions
                <input type="text" name="dimensions">
            </label>

            <label>certifié</label>
                    <select name="certifie">
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
            </label>
            
            <label>pays
                <input type="text" name="pays">
            </label>



            <label>condition
                <select name="condition_timbre_id">
                    <option value="">Selectionner une condition</option>
                   {%  for condition in conditions %}
                        <option value="{{ condition.id }}"> {{ condition.id }} {{ condition.nom }}</option>
                   {% endfor %}
                </select>
                

            </label>


            <label> photo 
                    <input type="file" name="photo" id="fileToUpload">
                    <input type="hidden" name="submit" value="upload photo">
            </label>



     <!--        
        <label>utlisateur
                <select name="user_id">
                    <option value="">Selectionner un Utilisateur</option>
                   {%  for user in users %}
                        <option value="{{user.id }}"> {{ uuser.id}} {{ user.username }}</option>
                   {% endfor %}
                </select>

        </label> -->


         <!--    <label> photo 

         
            <input type="file" name="photo" id="fileToUpload">
            <input type="hidden" name="submit" value="upload photo">
            
            
            </label> -->
           
         <!--    <input type="hidden" value="" class="btn"> -->
            <input type="submit" value="save" class="btn">
        </form>
    </div>
</body>
</html>

{{ include('footer.php', {title: 'Home'}) }} 