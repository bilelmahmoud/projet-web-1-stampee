<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="Nouvelle description pour la page d'Accueil de mr stampee">
                <title>{{ title }}</title>
                <link rel="stylesheet" href="{{path}}assets/css/styles.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
                <script>
    document.addEventListener('DOMContentLoaded', function () {
        var favoriButton = document.querySelector('.icone-favoris');

        if (favoriButton) {
            var enchereId = favoriButton.dataset.enchereId;
            var isFavori = (getCookie('favori_' + enchereId) === 'true');

            favoriButton.classList.toggle('favori', isFavori);
            favoriButton.style.color = isFavori ? 'red' : '';

            favoriButton.addEventListener('click', function (event) {
                event.preventDefault();

                isFavori = !isFavori;
                favoriButton.classList.toggle('favori', isFavori);
                favoriButton.style.color = isFavori ? 'red' : '';

                setCookie('favori_' + enchereId, isFavori.toString(), 365 * 24 * 60 * 60);

                document.getElementById('favori-form').submit();
            });

            function getCookie(name) {
                var value = "; " + document.cookie;
                var parts = value.split("; " + name + "=");
                if (parts.length === 2) return parts.pop().split(";").shift();
            }

            function setCookie(name, value, seconds) {
                var expires = "";
                if (seconds) {
                    var date = new Date();
                    date.setTime(date.getTime() + (seconds * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + value + expires + "; path=/";
            }
        }
    });
</script>
              
                
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
                        <li><a href="{{path}}Enchere/create">Add enchere</a></li>
                        <li><a href="{{path}}timbre/index">Mes timbres</a></li>
                        <li><a href="{{path}}Enchere/index">Mes encheres</a></li>
                        <li><a href="{{path}}mise/index">Mes Mises</a></li>
                        <li><a href="{{path}}favoris/index">Mes Favoris</a></li>
                      
                       
                        
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
                <li><a href="{{path}}Categorie/index">Categorie</a></li>
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




      