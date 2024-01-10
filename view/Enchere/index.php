{{ include('header.php', {title: 'Catalogue'}) }}

<body>
<main>



<section class=" grid-container" data-js-produit>
        
            <h1>les timbres de {{session.username}}</h1>



     
            {% for enchere in encheres %}

            
         
          
            {% if enchere.user_id == session.user_id %}
            
                  <article class="aritcle-1">
                    

                <div class="infos-image">
                <img src="{{ path }}uploads/{{enchere.image_nom}}" alt="Image du timbre">
                </div>

                <div class="infos-secondaires">
                  
                   
                    <!-- <h2 class="titre-timbre">{{timbre.nom}}</h2> -->
                    <div class="infos-secondaires-box">
                    <p>date_debut</p>
                    <p> <span class="info-span">{{enchere.date_debut}}</span></p>
                    </div>

                    <div class="infos-secondaires-box"> 
                    <p>date_fin</p>
                    <p> <span class="info-span">{{enchere.date_fin}}</span></p>
                    </div>

                    <div class="infos-secondaires-box"> 
                    <p>prix</p>
                    <p><span class="info-span">{{enchere.prix }} $ </span></p>

                    
                    </div>


                 

                    <div>


                            <input type="submit" value="Miser" class="bouton-personnalise">
                            <!-- <a href="{{path}}Enchere/show" class="bouton-personnalise">Miser</a><br> -->

                    </div>

                    <div>
                        <form   action="{{path}}enchere/destroy" method="post">
                            <input type="hidden" name="id" value="{{enchere.id}}">
                            <input type="submit" value="supprimer">
                        </form>
                    </div>
              


                 
                   
                   <!--  <p>
                        {% if timbre.certifie == 1 %}
                        <div class="infos-secondaires-box">
                            <p>certifié </p>
                            <p><span class="info-span">Oui</span> </p>
                        </div>
                        {% else %}
                        <div class="infos-secondaires-box">
                            <p>certifié </p>
                            <p><span class="info-span">Non</span> </p>
                        </div>    
                        {% endif %}
                    </p>
                    
                    <div class="infos-secondaires-box"> 
                    <p>pays </p>
                    <p><span class="info-span">{{timbre.pays}}</span></p>
                    </div>
                    
                    <div class="infos-secondaires-box"> 
                    <p>condition </p>
                    <p><span class="info-span">{{timbre.condition_nom}}</span></p>
                    </div>
                 
                </div>

                <div class='btn-supp-modif'>


                     <input type="submit" value="Miser" class="bouton-personnalise"> -->

                   <!-- <a href="{{path}}timbre/show/{{timbre.id}}" class="bouton-personnalise">afficher</a><br>
                   <a href="{{path}}timbre/edit/{{timbre.id}}" class="bouton-personnalise">modifier</a> -->
               <!--     <td><a href="{{path}}voiture/show/{{voiture.id}}">{{voiture.marque}}</a></td> -->
                   
                <!-- </div> --> 

            
       
            </article>
            {% endif %}
            {% endfor %}
</section> 
</main>      
      <!--   
        <a href="{{ path }}timbre/create" class="btn1">Ajouter</a> -->
       
       
</body>
  
</html>
{{ include('footer.php', {title: 'Home'}) }}    