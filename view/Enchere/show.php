
{{ include('header.php', {title: 'Catalogue'}) }}
<main class="main-produit">

{% for enchere in encheres %}
   
    <div class="affiche-image">
        <div class="parent-img">
            <img src="{{ path }}uploads/{{ enchere.image_nom }}" alt="Image du timbre">
        </div>
    </div>

    <h1>{{isFavori}}</h1>

    <div class="mise-produit">
        
        <!-- <span class="fa fa-heart coeur icone-favoris" data-js-favoris></span> -->
        </script>

<!-- Inclure l'ID de l'enchère dans l'attribut data-enchere-id -->
{{ message }}
{% for enchere in encheres %}
    <form id="favori-form" action="{{ path }}enchere/toggleFavoris/{{ enchere.id }}" method="post" data-enchere-id="{{ enchere.id }}">
        <input type="hidden" name="enchere_id" value="{{ enchere.id }}" />
        <button type="submit" class="fa fa-heart coeur icone-favoris {% if enchere.isFavori %}favori{% endif %}"></button>
    </form>
    <!-- Autres détails de l'enchère -->
{% endfor %}


        
        <div class="info-enchere">

            <p><span class="info-span">{{ enchere.nom }}  </span></p>

            <p><span class="info-span">{{ enchere.prix }} $  </span></p>

            
         
                    

        </div>

        <div class="info-description">
            <p>couleur : <span>{{ enchere.couleur }}</span></p>
          
            <p>condition : <span>{{enchere.condition_nom }}</span></p>
            <p>pays : <span>{{ enchere.pays }}</span></p>
            <p>tirage : <span>{{ enchere.tirage }}</span></p>
            <p>dimensions : <span>{{ enchere.dimensions }}</span></p>
        </div>

       <!--  <div class="btn">
            <a href="{{ path }}mise/create/{{ enchere.id }}">Placer votre enchère</a><br>
            
           
            <i class="fa-solid fa-hand-holding-dollar"></i>

        </div>
 -->


            <div class="btn">
                <form action="{{ path }}enchere/placerMise/{{ enchere.id }}" method="post">
                    <!-- Ajoutez les champs nécessaires pour votre formulaire de mise -->
                    <input type="hidden" name="enchere_id" value="{{ enchere.id }}">
                    <input type="hidden" name="prix" value="{{ enchere.prix }}">
                    <input type="text" name="mise_prix" id="mise_prix" placeholder="0">
                    <input type="submit" value="Placer votre enchère">
                </form>
            </div>


        <div class="info-mise-enchere">
                <p>Prix de départ : {{enchere.prix }} $  </p>
                <p>Nombre d'enchères placées :  </p>
                <p>temps restant <span><i class="fa-regular fa-clock icone"> :</i>  </span></p>
              
                 
                
        </div>  

     <!--    <div class="info-mise-enchere">
            <div>
                <form action="{{ path }}timbre/destroy" method="post">
                    <input type="hidden" name="id" value="{{ enchere.id }}">
                    <input type="submit" value="supprimer">
                </form>
            </div>
        </div> -->
    </div>

    {% endfor %}
    
</main>
{{ include('footer.php', {title: 'Home'}) }}

