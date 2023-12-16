<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="Nouvelle description pour la page d'Accueil de mr stampee">
                <title>{{ title }}</title>
                <link rel="stylesheet" href="{{path}}assets/css/styles.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
                
            </head>
            <header>
           <!--  <li><a href="{{path}}user/create">Inscription</a></li>
                <li><a href="{{path}}login">Login</a></li> -->
                                     
                        <ul>
                          
                        {% if guest %}
                        <li><a href="{{path}}user/create">Devenir membre</a></li>
                        <li><a href="{{path}}login">Connecter</a></li>
                        {% else %}
                        <li class="confirme-user">{{session.username }}</li>
                        <li><a href="{{path}}timbre/create">Add timbre</a></li>
                        <li><a href="{{path}}timbre/index">Mes timbres</a></li>
                      
                       
                        
                        {% if session.privilege == 1 %}
                          <li><a href="{{path}}user">Membres</a></li>
                        {% endif %}
                        

                        <li><a href="{{path}}login/logout">Deconnecter</a></li>

                        {% endif %}
                     
                        
                        </ul>
                      
                          
            </header>
            <nav>
            <ul>
              <!--   <li><a href="{{path}}">Home</a></li> -->
                <li role="menuitem" aria-label="Menu index" aria-haspopup="false">
                  <img class="logo" src="{{path}}assets/img/logo/logo-timbre1.jpg" alt="logo de mon site ">
                </li>
                <li><a href="{{path}}">Accueil</a></li>
                <li><a href="{{path}}">Categorie</a></li>
                <li><a href="{{path}}">produit</a></li>
          
              
               
          
                <li role="menuitem" aria-label="Menu index" aria-haspopup="false" class="drap">
                    <img class="drapeau" src="{{path}}assets/img/flag.jpg" alt="drapeau de l'anglettere">
                </li>
                      <!-- <li><a href="{{path}}user/create">Inscription</a></li> -->
           <!--      <li><a href="{{path}}login">Login</a></li> -->
              <!--    <li><a href="{{path}}login/logout">Logout</a></li>
         -->
           


               
              

            </ul>
        </nav>




      