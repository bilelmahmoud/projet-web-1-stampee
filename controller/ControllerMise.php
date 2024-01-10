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

        if (!isset($_SESSION['user_id'])) {
            RequirePage::url('login');
        }

        // Récupérez l'ID de l'utilisateur connecté
        $user_id = $_SESSION['user_id'];

        // Instanciez le modèle Mise
        $mise = new Mise;

        // Récupérez les mises de l'utilisateur actuel
        $misesUtilisateur = $mise->getMisesByUserId($user_id);
        // print_r($misesUtilisateur);

        return Twig::render('mise/index.php', ['misesUtilisateur' => $misesUtilisateur]);


        echo $twig->render('mise/index.twig', ['misesUtilisateur' => $misesUtilisateur]);


     
    }

    

}

?>