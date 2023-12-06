<?php

class Timbre extends CRUD {

    protected $table = 'timbre';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nom', 'date_creation','couleur' , 'tirage', 'dimensions', 'certife', 'pays', 'condition_timbre_id', 'user_id'];



    public function selectCondition(){
        $sql = "SELECT timbre.*, condition_timbre.nom as condition_nom FROM $this->table
        INNER JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id";
        $stmt = $this->query($sql);
        $timbreCondition = $stmt->fetchAll();
        return $timbreCondition;
    }
    
    public function selectUser(){
        $sql = "SELECT   timbre.*, user.username from $this->table
         INNER JOIN user ON utilisateur_id = user.id";
        $stmt = $this->query($sql);
        $timbreUser = $stmt->fetchAll();
        return $timbreUser;
    }  



    
    
}

?>