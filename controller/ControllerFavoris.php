<?php

RequirePage::model('CRUD');
RequirePage::model('Enchere');
RequirePage::model('Mise');
RequirePage::model('Favoris');
RequirePage::model('Image');
RequirePage::model('Timbre');
RequirePage::model('Condition');
RequirePage::library('Validation');

class ControllerFavoris extends Controller {
    public function index() {
        // Assurez-vous que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            RequirePage::url('login');
        }

        // Récupérez l'ID de l'utilisateur connecté
        $user_id = $_SESSION['user_id'];

        // Créez une instance du modèle Favoris
        $favoris = new Favoris;

        // Utilisez la méthode pour obtenir les enchères favorites de l'utilisateur
        $encheresFavorites = $favoris->getEncheresFavoritesByUserId($user_id);
        // print_r($encheresFavorites);

        // Transmettez les données à la vue pour affichage
        return Twig::render('Favoris/index.php', ['encheresFavorites' => $encheresFavorites]);
    }
}

?>