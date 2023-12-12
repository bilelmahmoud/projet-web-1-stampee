<?php

RequirePage::model('CRUD');
RequirePage::model('Timbre');
RequirePage::model('Condition');
RequirePage::model('User');
RequirePage::model('Image');

class ControllerTimbre extends controller {
    // public function index(){

    //     $timbre = new Timbre;
    //   /*   $selectCondition = $timbre->selectCondition();
    //     $timbres = $timbre->selectImages(); */
    //     $timbres = $timbre->selectAllWithImageAndConditionByUserId($user_id);
    //     print_r($timbres);
    //     die();
    //     return Twig::render('timbre/index.php', ['timbres' => $timbres]);

    // }

    public function index(){
        if (!isset($_SESSION['user_id'])) {
            RequirePage::url('login');
        }

        $user_id = $_SESSION['user_id'];
        $timbre = new Timbre;
        $timbres = $timbre->selectAllWithImageAndConditionByUserId($user_id);

        return Twig::render('timbre/index.php', ['timbres' => $timbres]);
    }

    public function create(){


            $condition = new Condition;
            $selectCondition = $condition->select();

            return Twig::render('timbre/create.php', ['conditions' => $selectCondition]);

    }

    public function store() {

        // Vérifier si l'utilisateur est connecté

            if (!isset($_SESSION['user_id'])) {
                // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
                RequirePage::url('login');
            }

            $user_id = $_SESSION['user_id'];
            // Ajouter l'ID de l'utilisateur à $_POST
            $_POST['user_id'] = $user_id;

            // Insérer le timbre dans la table timbre
            $timbre = new Timbre;
            $insert_timbre = $timbre->insert($_POST);

            // Si l'insertion du timbre est réussie
            if ($insert_timbre) {
                // Récupérer l'ID du timbre inséré
                $last_insert_id = $timbre->lastInsertId();

                // Assurez-vous que $last_insert_id est défini et n'est pas null
                if ($last_insert_id !== null) {
                    // Vérifier si une image est téléchargée
                    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                        $target_dir = 'uploads/';
                        $target_file = $target_dir . basename($_FILES['photo']['name']);

                        $image = new Image;
                        $image_data = [
                            'nom' => $_FILES['photo']['name'],
                            'type' => 'principale',
                            'timbre_id' => $last_insert_id
                        ];

                        // Insérer les données de l'image dans la table image
                        $insert_image = $image->insert($image_data);

                        // Si l'insertion de l'image est réussie, déplacer le fichier téléchargé
                        if ($insert_image && move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                            // Rediriger vers la page d'index des timbres
                          /*   return Twig::render('timbre/index.php'); */
                        }
                    } else {
                        // Aucune image n'a été téléchargée
                        // Rediriger vers la page d'index des timbres
                        // RequirePage::url('timbre/index');
                    }
                }
            }

            // En cas d'échec, rediriger vers une page d'erreur
            RequirePage::url('timbre/index');
        }
     public function show($id){

        $timbre = new Timbre;
        // $selectId = $timbre->selectId($id);
        $selectConditionImage = $timbre->selectWithImageAndCondition($id);


       /*  $image = new Image;
        $selectImage = $image->selectid(['timbre_id' => $id]); */
         $condition = new Condition;
         $selectCondition = $condition->selectId($selectConditionImage[0]['condition_timbre_id']);
        // echo "<pre>";
         // print_r($selectCondition);
        //  echo "</pre>";
        // die();
        return Twig::render('timbre/show.php', ['timbre'=>$selectConditionImage[0],'condition'=>$selectCondition]);
      /*   return Twig::render('timbre/show.php'); */
    }

     public function edit($id){
        $timbre = new Timbre;
        $selectConditionImage = $timbre->selectWithImageAndCondition($id);
        $condition = new Condition;
        $selectCondition = $condition->select();
       /*  $selectId = $timbre->selectId($id); */


       /*  echo "<pre>";
        print_r($selectConditionImage);
        echo "</pre>";
        die();
        */
        return Twig::render('timbre/edit.php', ['timbre'=>$selectConditionImage[0],'conditions'=>$selectCondition]);
    }
     public function update(){
       /*   print_r($_POST);
         die(); */
 
        $timbre = new Timbre;
        $update = $timbre->update($_POST);

        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        RequirePage::url('timbre/show/'.$_POST['id']);
    }  

    public function destroy(){
        $timbre = new Timbre;
        $image = new Image;
        $image->deleteByTimbreId($_POST['id']);
        $timbre->delete($_POST['id']);
        RequirePage::url('timbre/index');
    }

       
}

?>