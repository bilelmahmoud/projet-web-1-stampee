<?php

RequirePage::model('CRUD');
RequirePage::model('Timbre');
RequirePage::model('Condition');
RequirePage::model('User');
RequirePage::model('Image');
RequirePage::library('Validation');

class ControllerTimbre extends controller {
    

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
      
            $validation = new Validation;
            extract($_POST);
            $validation->name('nom')->value($nom)->required();
            $validation->name('date_creation')->value($date_creation)->required();
            $validation->name('couleur')->value($couleur)->required();
            $validation->name('tirage')->value($tirage)->required();
            $validation->name('dimensions')->value($dimensions)->required();
            $validation->name('condition_timbre_id')->value($condition_timbre_id)->required();
        
        
            if (!$validation->isSuccess()) {
                $errors = $validation->displayErrors();
                $condition = new Condition;
                $selectCondition = $condition->select();

                           
                return Twig::render('timbre/create.php', ['errors' => $errors,'conditions' => $selectCondition, 'timbre' => $_POST]);
               
    

            
            }else if (!isset($_SESSION['user_id'])) {
               
                RequirePage::url('login');
            }

            $user_id = $_SESSION['user_id'];
            $_POST['user_id'] = $user_id;
            $timbre = new Timbre;
            $insert_timbre = $timbre->insert($_POST);
        
        

            if ($insert_timbre) {
            
                $last_insert_id = $timbre->lastInsertId();

                if ($last_insert_id !== null) {

                    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                        $target_dir = 'uploads/';
                        $target_file = $target_dir . basename($_FILES['photo']['name']);

                        $image = new Image;
                        $image_data = [
                            'nom' => $_FILES['photo']['name'],
                            'type' => 'principale',
                            'timbre_id' => $last_insert_id
                        ];
                    
                        $insert_image = $image->insert($image_data);

                        if ($insert_image && move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                         
                        }
                    } else {
                       
                         RequirePage::url('timbre/index');
                    }
                }
            }

               
            RequirePage::url('timbre/index');
        }
     public function show($id){

         $timbre = new Timbre;
         $selectConditionImage = $timbre->selectWithImageAndCondition($id);

         $condition = new Condition;
         $selectCondition = $condition->selectId($selectConditionImage[0]['condition_timbre_id']);
  
        return Twig::render('timbre/show.php', ['timbre'=>$selectConditionImage[0],'condition'=>$selectCondition]);
    
    }

     public function edit($id){
        $timbre = new Timbre;
        $selectConditionImage = $timbre->selectWithImageAndCondition($id);
        $condition = new Condition;
        $selectCondition = $condition->select();
     
       
        return Twig::render('timbre/edit.php', ['timbre'=>$selectConditionImage[0],'conditions'=>$selectCondition]);
    }


  

  
    public function update(){
        $timbre = new Timbre;
        $update = $timbre->update($_POST);
    
        if ($update !== null) {
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
                $target_dir = 'uploads/';
                $target_file = $target_dir . basename($_FILES['photo']['name']);
    
                $image = new Image;
                $image_data = [
                    'nom' => $_FILES['photo']['name'],
                    'type' => 'principale',
                    'timbre_id' => $update
                ];
    
              
                $image->deleteByTimbreId($update);
    
            
                $insert_image = $image->insert($image_data);
    
                if ($insert_image && move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                  
                } else {
                  
                    RequirePage::url('timbre/index');
                }
            } else {
              
                RequirePage::url('timbre/index');
            }
        }
    
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