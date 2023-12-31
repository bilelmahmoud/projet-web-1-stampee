<?php
RequirePage::model('CRUD');
RequirePage::model('User');
RequirePage::model('Timbre');
RequirePage::model('Privilege');
RequirePage::library('Validation');

class ControllerUser extends controller {

 


    public function index(){
        $user = new user;
        $select = $user->select('username');
        
        $privilege = new Privilege;
        $i=0;
        foreach($select as $user){
             $selectId = $privilege->selectId($user['privilege_id']);
             $select[$i]['privilege']= $selectId['privilege'];
             $i++;
        }
        return Twig::render('user/index.php', ['users'=>$select]);
    }

    public function create(){
    
            $privilege = new Privilege;
            $select = $privilege->select('privilege');
            return Twig::render('user/create.php', ['privileges' => $select]);
      
    }

    public function store(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($nom)->max(100)->required();
        $validation->name('utilisateur')->value($username)->max(50)->required()->pattern('email');
        $validation->name('mot de passe')->value($password)->max(20)->min(6);
       
        if(!$validation->isSuccess()){
            // var_dump($validation->getErrors());
            $errors =  $validation->displayErrors();
            //echo $errors;
            $privilege = new Privilege;
            $select = $privilege->select('privilege');
         return Twig::render('user/create.php', ['errors' =>$errors, 'privileges' => $select, 'user' => $_POST]);
         exit();
        }

        $user = new user;
        

        $options = [
            'cost' => 10
        ];
        $salt = "H3@_l?a";
        $passwordSalt = $_POST['password'].$salt;
        $_POST['password'] =  password_hash($passwordSalt, PASSWORD_BCRYPT, $options);
        $_POST['privilege_id'] = 2;
        $insert = $user->insert($_POST);

        RequirePage::url('login');
    }

    public function destroy(){
       /*  print_r($_POST);
        die(); */
        $user = new User;
          
        $timbre = new Timbre;
        $timbre->deleteByUserId($_POST['id']); 
       
        $update = $user->delete($_POST['id']);
        
        RequirePage::url('user/index');
    }



}


?>