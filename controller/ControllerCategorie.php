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
        
        // Utilisez la méthode pour récupérer tous les timbres avec leurs images et conditions
        $timbres =  $timbre->selectAllWithImageAndCondition();;

        // Utilisez la méthode pour récupérer toutes les enchères
        $encheres = $enchere->select();
        echo '<pre>';
        print_r($timbres);
        // print_r($encheres);
        echo '</pre>';
        return Twig::render('Categorie/index.php', ['encheres' => $encheres,'timbres' => $timbres]);
    }

    // ... autres méthodes
}