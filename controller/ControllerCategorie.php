<?php

RequirePage::model('CRUD');
RequirePage::model('Enchere');
RequirePage::model('Mise');
RequirePage::model('Image');
RequirePage::model('Timbre');
RequirePage::library('Validation');

class ControllerCategorie extends controller {
    public function index() {
        $enchere = new Enchere;
        $timbre = new Timbre;
        
     
        $encheres = $enchere->afficheEnchere();
      
        return Twig::render('Categorie/index.php', ['encheres' => $encheres]);
    }

    
}