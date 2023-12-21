<?php
require_once('CRUD.php');
class Mise extends CRUD {

    protected $table = 'mise';
    protected $primaryKey = 'id';
    protected $fillable = ['enchere_id', 'user_id'];
   




   


}
?>