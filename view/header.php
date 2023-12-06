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
            <nav>
            <ul>
              <!--   <li><a href="{{path}}">Home</a></li> -->
                <li role="menuitem" aria-label="Menu index" aria-haspopup="false">
                  <img class="logo" src="{{path}}assets/img/logo/logo-timbre1.jpg" alt="logo de mon site ">
                </li>
                <li><a href="{{path}}">Accueil</a></li>
                <li><a href="{{path}}timbre/index">Categorie</a></li>
                <li><a href="{{path}}">produit</a></li>
                <li><a href="{{path}}user/create">Inscription</a></li>
                <li><a href="{{path}}login">Login</a></li>
                <li><a href="{{path}}timbre/create">Add timbre</a></li>
             <!--    <li><a href="{{path}}user">Users</a></li> -->
                <li><a href="{{path}}login/logout">Logout</a></li>
                <li class="confirme-user">bienvenue{{ session.username }}</li>
               <!--  <li role="menuitem" aria-label="Menu index" aria-haspopup="false" class="drap">
                    <img class="drapeau" src="{{path}}assets/img/flag.jpg" alt="drapeau de l'anglettere">
                </li> -->
           


               
              

            </ul>
        </nav>




      