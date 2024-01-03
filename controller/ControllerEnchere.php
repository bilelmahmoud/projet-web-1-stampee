<?php

RequirePage::model('CRUD');
RequirePage::model('Enchere');
RequirePage::model('Mise');
RequirePage::model('Image');
RequirePage::model('Timbre');
RequirePage::model('Condition');
RequirePage::library('Validation');



    class ControllerEnchere extends controller {


        public function index() {
            $enchere = new Enchere;
            $timbre = new Timbre;
            $encheres = $enchere->afficheEnchere();
      
            return Twig::render('Enchere/index.php', ['encheres' => $encheres]);
        }
    

    


        public function create(){
        if (!isset($_SESSION['user_id'])) {
            RequirePage::url('login');
        }
    

        $timbre = new Timbre;
        $timbres = $timbre->select();

        return Twig::render('Enchere/create.php', ['timbres' => $timbres]);
    }



    public function store(){
        if (!isset($_SESSION['user_id'])) {
            RequirePage::url('login');
        }
        
        $user_id = $_SESSION['user_id'];
        $_POST['user_id'] = $user_id;
        $enchere = new Enchere;
        
    
      
        $id = $enchere->insert($_POST);

        $timbre = new Timbre;
        $update = $timbre->updateByTimbeId($_POST['timbre_id'], ['enchere_id' => $id]);

    
       
        RequirePage::url('Enchere/index');
    }

    public function destroy(){
        $enchere = new Enchere;
        $enchere->delete($_POST['id']);
        RequirePage::url('Enchere/index');
    }

    public function show($id) {
   
     
        $enchere = new Enchere;
        $encheres = $enchere->afficheEnchereParId($id);
      
        
    
        return Twig::render('Enchere/show.php', ['encheres' => $encheres]);

    }
    
    // public function placerMise() {
    //     // Assurez-vous que l'utilisateur est connecté
    //     if (!isset($_SESSION['user_id'])) {
    //         RequirePage::url('login');
    //     }
    
    //     // Récupérez l'ID de l'utilisateur connecté
    //     $user_id = $_SESSION['user_id'];
    
    //     // Récupérez l'ID de l'enchère à partir du formulaire
    //     $enchere_id = $_POST['enchere_id'];

    //     $mise = new Mise;
    
    //     // Vérifiez si l'utilisateur a déjà placé une mise pour cette enchère
    //     $conditions = ['enchere_id' => $enchere_id, 'user_id' => $user_id];
    //     $misesExistantes = $mise->find($conditions);
    
    //     if (!empty($misesExistantes)) {
    //         // L'utilisateur a déjà placé une mise pour cette enchère
    //         $errorMessage = 'Vous avez déjà placé une mise pour cette enchère.';
    //         RequirePage::url('Enchere/show/' . $enchere_id, ['error' => $errorMessage]);
    //     } else {
    //         // L'utilisateur n'a pas encore placé de mise pour cette enchère, continuez avec l'insertion
    //         // Récupérez le montant de la mise depuis le formulaire
    //         $mise_prix = $_POST['mise_prix'];
    
    //         // Récupérez le dernier prix de l'enchère
    //         $enchere = new Enchere;
    //         $dernier_prix = $enchere->getDernierPrix($enchere_id);
            
    
    //         // Vérifiez si la mise est supérieure au dernier prix
    //         if ($mise_prix > $dernier_prix) {
    //             // Enregistrez la mise dans la base de données
    //             $mise->insert([
    //                 'enchere_id' => $enchere_id,
    //                 'user_id' => $user_id,
    //                 'mise_date' => date('Y-m-d H:i:s'),
    //                 'mise_prix' => $mise_prix
    //             ]);

        
    
    //             // Mettez à jour le prix de l'enchère dans la table Enchere avec le nouveau montant de la mise
    //             // $enchere->update(['enchere_id' => $enchere_id, 'prix' => $mise_prix]);
    //             $data = ['id' => $enchere_id, 'prix' => $mise_prix];
    //             $enchere->update($data);
    //             // Redirigez l'utilisateur vers la page de l'enchère après avoir placé la mise
    //             RequirePage::url('Enchere/show/' . $enchere_id);
    //         } else {
    //             // Le montant de la mise n'est pas suffisant, redirigez l'utilisateur avec un message d'erreur
    //             $errorMessage = 'Le montant de la mise doit être supérieur au dernier prix.';
    //             RequirePage::url('Enchere/show/' . $enchere_id, ['error' => $errorMessage]);
    //         }
    //     }
    // }


    public function placerMise() {
        // Assurez-vous que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            RequirePage::url('login');
        }
    
        // Récupérez l'ID de l'utilisateur connecté
        $user_id = $_SESSION['user_id'];
    
        // Récupérez l'ID de l'enchère à partir du formulaire
        $enchere_id = $_POST['enchere_id'];
    
        $mise = new Mise;
    
        // Récupérez le montant de la mise depuis le formulaire
        $mise_prix = $_POST['mise_prix'];
    
        // Récupérez le dernier prix de l'enchère
        $enchere = new Enchere;
        $dernier_prix = $enchere->getDernierPrix($enchere_id);
    
        // Vérifiez si la mise est supérieure au dernier prix
        if ($mise_prix > $dernier_prix) {
            // Enregistrez la mise dans la base de données
            $mise->insert([
                'enchere_id' => $enchere_id,
                'user_id' => $user_id,
                'mise_date' => date('Y-m-d H:i:s'),
                'mise_prix' => $mise_prix
            ]);
    
            // Mettez à jour le prix de l'enchère dans la table Enchere avec le nouveau montant de la mise
            $data = ['id' => $enchere_id, 'prix' => $mise_prix];
            $enchere->update($data);
    
            // Redirigez l'utilisateur vers la page de l'enchère après avoir placé la mise
            RequirePage::url('Enchere/show/' . $enchere_id);
        } else {
            // Le montant de la mise n'est pas suffisant, redirigez l'utilisateur avec un message d'erreur
            $errorMessage = 'Le montant de la mise doit être supérieur au dernier prix.';
            RequirePage::url('Enchere/show/' . $enchere_id, ['error' => $errorMessage]);
        }
    }
    
}
    
    





?>