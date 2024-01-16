{{ include('header.php', {title: 'Catalogue'}) }}
 <!-- <script type="module" src="{{path}}assets/js/main.js"></script> -->
              

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




        <div data-js-condition>

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

        <div data-js-prix>
    <h3>prix</h3>

    <fieldset>
        <label for="superbe">0 a 200$</label>
        <input type="checkbox" name="prix" value="200" id="superbe">
    </fieldset>

    <fieldset>
        <label for="bonne">200$ - 400$</label>
        <input type="checkbox" name="prix" value="400" id="bonne">
    </fieldset>

    <fieldset>
        <label for="endommage">400$ - 600$</label>
        <input type="checkbox" name="prix" value="600" id="endommage">
    </fieldset>

    <fieldset>
        <label for="mauvaise">800$ et plus</label>
        <input type="checkbox" name="prix" value="800" id="mauvaise">
    </fieldset>
</div>





        <!-- <div>

            <h3>Prix </h3>

            <fieldset>
                <label for="prix"></label>
                <span>0 $</span>
                <input type="range" id="prix" name="prix" min="0" max="800" step="100" value="0">
                <span>800 $</span>
            </fieldset>

        </div> -->

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

<script id="encheres-data" type="application/json">
            {{ encheres|json_encode|raw }}
 </script>



<section class=" grid-container" data-js-produit>
        
          <!--   <h1>les timbres de {{session.username}}</h1> -->

        
            {% for enchere in encheres %}

        
                  <article data-js-produit class="aritcle-1 condition-aritcle-1">
                    

                <div class="infos-image">
                <img src="{{ path }}uploads/{{enchere.image_nom}}" alt="Image du timbre">
                </div>

                <div class="infos-secondaires">
                    
                  
                 <div class="infos-secondaires-box"> 
                  <p>nom du timbre</p>
                 <p><span class="info-span">{{ enchere.nom }}</span></p>
                 </div>
                   
                  

                    <div class="infos-secondaires-box"> 
                    <p>prix</p>
                    <p><span class="info-span">{{enchere.prix }} $ </span></p>
                    </div>


                    <div class="infos-secondaires-box"> 
                    <p>pays</p>
                    <p><span class="info-span">{{enchere.pays}}</span></p>
                    </div>

                    <div class="infos-secondaires-box"> 
                    <p>condition </p>
                    <p><span class="info-span">{{enchere.condition_nom }}</span></p>
                    </div>
                    


                  

                    <div>


                            <!-- <input type="submit" value="Miser" class="bouton-personnalise"> -->
                           <a href="{{path}}Enchere/show/{{enchere.id}}" class="bouton-personnalise">Miser</a><br>

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