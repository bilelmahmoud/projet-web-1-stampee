<?php
require_once('CRUD.php');
class Condition extends CRUD {

    protected $table = 'condition_timbre';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nom' ];

    
}

?>