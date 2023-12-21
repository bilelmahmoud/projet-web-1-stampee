<?php

RequirePage::model('CRUD');
RequirePage::model('Enchere');
RequirePage::model('Mise');
RequirePage::model('Image');
RequirePage::model('Timbre');
RequirePage::library('Validation');



    class ControllerEnchere extends controller {

        public function index() {
            if (!isset($_SESSION['user_id'])) {
                RequirePage::url('login');
            }
        
            $user_id = $_SESSION['user_id'];
       
            $enchere = new Enchere;
            $timbre = new Timbre;
        
            // Utilisez la méthode pour récupérer tous les timbres avec leurs images et conditions
            $timbres = $timbre->selectAllWithImageAndConditionByUserId($user_id);
        
            // Utilisez la méthode pour récupérer toutes les enchères
            $encheres = $enchere->selectAllByUserId($user_id);
            

            echo '<pre>';
            print_r($timbres);
            print_r($encheres);
            echo '</pre>';
        
            return Twig::render('Enchere/index.php', ['encheres' => $encheres, 'timbres' => $timbres]);
        }
        public function create(){
        if (!isset($_SESSION['user_id'])) {
            RequirePage::url('login');
        }
    
        $user_id = $_SESSION['user_id'];
        $_POST['user_id'] = $user_id;
        $timbre = new Timbre;
        $timbres = $timbre->selectAllWithImageAndConditionByUserId($user_id);

        return Twig::render('Enchere/create.php', ['timbres' => $timbres]);
    }



    public function store(){
        if (!isset($_SESSION['user_id'])) {
            RequirePage::url('login');
        }
        
        $user_id = $_SESSION['user_id'];
        $_POST['user_id'] = $user_id;
        $enchere = new Enchere;
        
    
        // Utilisez votre propre méthode pour ajouter l'enchère
        $id = $enchere->insert($_POST);

        $timbre = new Timbre;
        $update = $timbre->updateByTimbeId($_POST['timbre_id'], ['enchere_id' => $id]);

    
        // Redirigez l'utilisateur vers la page de création
        RequirePage::url('Enchere/index');
    }

    public function destroy(){
        $enchere = new Enchere;
        $enchere->delete($_POST['id']);
        RequirePage::url('Enchere/index');
    }
}



?>