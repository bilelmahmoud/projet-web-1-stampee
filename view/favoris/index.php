{{ include('header.php', {title: 'Favoris'}) }}

<body>
<main>



<section class=" grid-container" data-js-produit>
        
          <!--   <h1>les timbres de {{session.username}}</h1> -->

     
          {% for enchereFavorite in encheresFavorites %}
          <article class="aritcle-1">
        <div class="infos-image">
            <img src="{{ path }}uploads/{{ enchereFavorite.image_nom }}" alt="Image du timbre">
        </div>

        <div class="infos-secondaires">
            <div class="infos-secondaires-box">
                <p>Date de début</p>
                <p><span class="info-span">{{ enchereFavorite.date_debut }}</span></p>
            </div>

            <div class="infos-secondaires-box">
                <p>Date de fin</p>
                <p><span class="info-span">{{ enchereFavorite.date_fin }}</span></p>
            </div>

            <div class="infos-secondaires-box">
                <p>Prix</p>
                <p><span class="info-span">{{ enchereFavorite.prix }} $</span></p>
            </div>
        </div>

        <div>


<input type="submit" value="Miser" class="bouton-personnalise">
<!-- <a href="{{path}}Enchere/show" class="bouton-personnalise">Miser</a><br> -->

</div>
    </article>
            {% endfor %}
</section> 
</main>      
      <!--   
        <a href="{{ path }}timbre/create" class="btn1">Ajouter</a> -->
       
       
</body>
  
</html>
{{ include('footer.php', {title: 'Home'}) }}    