<?php

RequirePage::model('CRUD');
RequirePage::model('Enchere');
RequirePage::model('Mise');
RequirePage::model('Image');
RequirePage::model('Timbre');
RequirePage::model('Condition');
RequirePage::library('Validation');

class ControllerMise extends Controller {


    
    public function index() {
     
    }

    public function create($id) {
        $enchere = new Enchere;
        $encheres = $enchere->afficheEnchereParId($id);
    
        return Twig::render('mise/create.php', ['enchere' => $encheres[0]]);
    }

}

?>