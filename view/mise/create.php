
{{ include('header.php', {title: 'Catalogue'}) }}
<main class="main-produit">
        
{% for enchere in encheres %}

    <div class="affiche-image">
        <div class="parent-img">
            <img src="{{ path }}uploads/{{ enchere.image_nom }}" alt="Image du timbre">
        </div>
    </div>



    <div class="mise-produit">
        <span class="fa fa-heart coeur icone-favoris"></span>
        
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

        <div class="btn">
            <a href="{{ path }}mise/create/{{ enchere.id }}">Placer votre enchère</a><br>
            
            <!-- <div>Placer votre enchère</div> -->
            <i class="fa-solid fa-hand-holding-dollar"></i>

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

   