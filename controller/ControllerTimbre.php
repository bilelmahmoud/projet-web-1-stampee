<?php

RequirePage::model('CRUD');
RequirePage::model('Timbre');
RequirePage::model('Condition');
RequirePage::model('User');
/* RequirePage::model('image'); */

class ControllerTimbre extends controller {
    public function index(){
        
        $timbre = new Timbre;
        $selectCondition = $timbre->selectCondition();
       /*  print_r($selectCondition);
        die(); */
        return Twig::render('timbre/index.php', ['timbres'=>$selectCondition]);

    }

    public function create(){
         
        $user = new User;
        $selectUser = $user->select(); 
        $condition = new Condition;
        $selectCondition = $condition->select();
        return Twig::render('timbre/create.php', ['conditions'=>$selectCondition, 'users'=>$selectUser] );
    }

    public function store(){
  
        /*print_r($_POST);
        die(); */
        $timbre = new Timbre;
        $insert = $timbre->insert($_POST);
        RequirePage::url('timbre/index');
    }


  /*   public function show($id){
        
        $client = new Client;
        $selectId = $client->selectId($id);
        $ville = new Ville;
        $selectVille = $ville->selectId($selectId['ville_id']);
        return Twig::render('client-show.php', ['client'=>$selectId, 'ville'=>  $selectVille['ville']]);
    }

    public function edit($id){
        $client = new Client;
        $selectId = $client->selectId($id);
        $ville = new Ville;
        $selectVilles = $ville->select('ville');
        return Twig::render('client-edit.php', ['client'=>$selectId, 
                                'villes'=>$selectVilles]);
    }
    public function update(){
        print_r($_POST);

        $client = new Client;
        $update = $client->update($_POST);

        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        RequirePage::url('client/show/'.$_POST['id']);
    }*/

    public function destroy(){
        //print_r($_POST);
        $timbre = new Timbre;
        $update = $timbre->delete($_POST['id']);
        RequirePage::url('timbre/index');
    }  
}

?>