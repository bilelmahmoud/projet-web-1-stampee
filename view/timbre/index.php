{{ include('header.php', {title: 'Liste des timbres'}) }}
<body>
<main>


<aside>


    <form>


        <h2>Filtres de recherche</h2>


        <div>

            <h3>Régions d'origine</h3>


            <fieldset>
                <label for="europe">Europe</label>
                <input type="checkbox" name="europe" id="europe">
            </fieldset>

            <fieldset>
                <label for="amerique">Amerique</label>
                <input type="checkbox" name="amerique" id="amerique">
            </fieldset>

            <fieldset>
                <label for="afrique">Afrique</label>
                <input type="checkbox" name="afrique" id="afrique">
            </fieldset>

            <fieldset>
                <label for="asie">Asie</label>
                <input type="checkbox" name="asie" id="asie">
            </fieldset>


        </div>




        <div>

            <h3>condition</h3>


            <fieldset>
                <label for="superbe">Superbe</label>
                <input type="checkbox" name="superbe" id="superbe">
            </fieldset>

            <fieldset>
                <label for="bonne">Bonne</label>
                <input type="checkbox" name="bonne" id="bonne">
            </fieldset>

            <fieldset>
                <label for="endommage">Endommagé</label>
                <input type="checkbox" name="endommage" id="endommage">
            </fieldset>

            <fieldset>
                <label for="mauvaise">Mauvaise</label>
                <input type="checkbox" name="mauvaise" id="mauvaise">
            </fieldset>



        </div>




        <div>

            <h3>Prix </h3>

            <fieldset>
                <label for="prix"></label>
                <span>0 $</span>
                <input type="range" id="prix" name="prix" min="0" max="800" step="100" value="0">
                <span>800 $</span>
            </fieldset>

        </div>

        <div>

            <h3> Année :</h3>

            <label for="date"></label>
            <select id="date" name="date">
                <option value="1900-1950">1900-1950</option>
                <option value="1950-2000">1990-2000</option>
                <option value="2000-2023">2000-2023</option>
            </select>


        </div>

        <div>

            <h3>Thème :</h3>


            <label for="theme"></label>
            <select id="theme" name="theme">
                <option value="tous">Tous les thèmes</option>
                <option value="faune">Faune</option>
                <option value="flore">Flore</option>
                <option value="histoire">Histoire</option>
                <option value="personnalites">Personnalités</option>
            </select>

        </div>




    </form>

</aside>

<section class=" grid-container" data-js-produit>
        
            <h1>Catalogue d'enchères</h1>

     
            {% for timbre in timbres %}
                  <article class="aritcle-1">

                <div class="infos-image">
                <img src="{{ path }}uploads/{{ timbre.image_nom }}" alt="Image du timbre">
                </div>

                <div class="infos-secondaires">
                  
                   
                    <h2 class="titre-timbre">{{timbre.nom}}</h2>
                    <div class="infos-secondaires-box">
                    <p>date</p>
                    <p> <span class="info-span">{{timbre.date_creation}}</span></p>
                    </div>

                    <div class="infos-secondaires-box"> 
                    <p>couleur </p>
                    <p> <span class="info-span">{{timbre.couleur}}</span></p>
                    </div>

                    <div class="infos-secondaires-box"> 
                    <p>dimensions</p>
                    <p><span class="info-span" >{{timbre.dimensions}}</span></p>
                    </div>

                 
                   
                    <p>
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


                   <!--  <input type="submit" value="Miser" class="bouton-personnalise"> -->

                   <a href="{{path}}timbre/show/{{timbre.id}}" class="bouton-personnalise">afficher</a><br>
                   <a href="{{path}}timbre/show/{{timbre.id}}" class="bouton-personnalise">modifier</a>
               <!--     <td><a href="{{path}}voiture/show/{{voiture.id}}">{{voiture.marque}}</a></td> -->
                   
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