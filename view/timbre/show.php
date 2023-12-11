{{ include('header.php', {title: 'Voiture Edit'}) }}

<!-- body>
    <div class="container">
        <h1>Details du voiture</h1>

        <p><strong>marque:</strong> {{ voiture.marque }} </p>
        <p><strong>modele:</strong> {{ voiture.modele }} </p>
        <p><strong>annee:</strong> {{ voiture.annee }}</p>
        <p><strong>categorie:</strong> {{ categories}}</p>
        <a href="{{path}}voiture/edit/{{ voiture.id }}" class="btn-modif">Modifier</a>
        <img src="{{path}}/uploads/{{ voiture.photo }}" alt="photo voiture">
       
      
    </div>
</body> -->
</html>


<main class="main-produit">
        

        <div class="affiche-image">

            <div class="parent-img" >

            <img src="{{ path }}uploads/{{ timbre.image_nom }}" alt="Image du timbre">

            </div>

        </div>

        <div class="mise-produit">
  

                <span  class="fa fa-heart coeur icone-favoris" ></span>
         

            

            <div class="info-enchere">
                <p>{{timbre.nom}}</p>
                <p>{{timbre.date_creation}} </p>
                <p>{{dimensions}}</p>
                  
               
               
            </div>


            <div class="info-description">

                <p>{{timbre.couleur}}</p>
                <p>{{condition.nom}}</p>
             
             
            </div>

            <div class="btn">

                <div>Placer votre enchère</div>
                
                
                <i class="fa-solid fa-hand-holding-dollar"></i>

    
            </div>


            <div class="info-mise-enchere">
                <p>Prix de départ : 399$  </p>
                <p>Nombre d'enchères placées : 0 </p>
                <p>temps restant <span><i class="fa-regular fa-clock icone"> :</i>  21h 30 mn </span></p>

                <div>
                        <form   action="{{path}}timbre/destroy" method="post">
                            <input type="hidden" name="id" value="{{timbre.id}}">
                            <input type="submit" value="supprimer">
                        </form>
                </div>
              
                 
                
            </div>  
            
            


        </div>

       

        

<!--            
        <div class="produit-similaire">

            <h1>Enchères similaires</h1>

            
            <article class="aritcle-1">

                <div>

                    <img src="./assets/img/timbre10.jpg" alt="timbre">

                </div>

                <div>
                    <h2>Nom</h2>
                    <p>Régions d'origine: [Nom ] </p>
                    <p>Valeur : [Valeur] $</p>
                    <p>Statut: [Statut ]</p>



                </div>

                <div>


                    <input type="submit" value="Miser" class="bouton-personnalise">

                </div>

            </article>

            <article class="aritcle-1">

                <div>

                    <img src="./assets/img/timbre6.jpg" alt="timbre">

                </div>

                <div>
                    <h2>Nom</h2>
                    <p>Régions d'origine: [Nom ] </p>
                    <p>Valeur : [Valeur] $</p>
                    <p>Statut: [Statut ]</p>



                </div>

                <div>
                       
                    <input type="submit" value="Miser" class="bouton-personnalise">
         

                </div>

            </article>
            <article class="aritcle-1">

                <div>

                    <img src="./assets/img/timbre7.jpg" alt="timbre">

                </div>

                <div>
                    <h2>Nom</h2>
                    <p>Régions d'origine: [Nom ] </p>
                    <p>Valeur : [Valeur] $</p>
                    <p>Statut: [Statut ]</p>



                </div>

                <div>

                    <input type="submit" value="Miser" class="bouton-personnalise">
                

                </div>

            </article>
            <article class="aritcle-1">

                <div>

                    <img src="./assets/img/timbre8.jpg" alt="timbre">

                </div>

                <div>
                    <h2>Nom</h2>
                    <p>Régions d'origine: [Nom ] </p>
                    <p>Valeur : [Valeur] $</p>
                    <p>Statut: [Statut ]</p>



                </div>

                <div>


                    <input type="submit" value="Miser" class="bouton-personnalise">

                </div>

            </article>


        </div>  -->



    </main>
    <footer>
        <div>
            <img class="logo" src="./assets/img/logo/logo-timbre1.jpg" alt="logo de mon site ">

        </div>
         
        <div class="contact">
        
            <p>info@site-detimbres.com</p>
            <p><span><i class="fa-solid fa-phone"></i></span> 514 999-7755 </p> 
        </div>

        <div class="reseau-sociaux">
          
        <span><i class="fa-brands fa-instagram fa-2xl"></i></span>
        <span><i class="fa-brands fa-facebook fa-2xl"></i></span>
        <span><i class="fa-brands fa-x-twitter fa-2xl"></i></span>

        </div>

    </footer>
</body>
</html>

