<?php

class Timbre extends CRUD {

    protected $table = 'timbre';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'date_creation','couleur' , 'tirage', 'dimensions', 'certife', 'pays', 'condition_timbre_id', 'user_id'];



  /*   public function selectCondition(){
        $sql = "SELECT timbre.*, condition_timbre.nom as condition_nom FROM $this->table
        INNER JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id";
        $stmt = $this->query($sql);
        $timbreCondition = $stmt->fetchAll();
        return $timbreCondition;
    }


    public function selectImages() {
        $sql = "SELECT timbre.*, image.nom AS image_nom FROM timbre
               LEFT JOIN image ON timbre.id = image.timbre_id";
        $stmt = $this->query($sql);
        $imageTimbre = $stmt->fetchAll();
        return  $imageTimbre ;
    } */


    public function selectAllWithImageAndConditionByUserId($user_id) {
        $sql = "SELECT timbre.*, image.nom AS image_nom, condition_timbre.nom AS condition_nom FROM timbre
            LEFT JOIN image ON timbre.id = image.timbre_id
            LEFT JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id
            WHERE timbre.user_id = $user_id";

            $stmt = $this->query($sql);
            $timbreConditionImage = $stmt->fetchAll();
            return  $timbreConditionImage ;
    }

    public function selectWithImageAndCondition($id) {
        $sql = "SELECT timbre.*, image.nom AS image_nom, condition_timbre.nom AS condition_nom FROM timbre
            LEFT JOIN image ON timbre.id = image.timbre_id
            LEFT JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id
            WHERE timbre.id = $id";
            $stmt = $this->query($sql);
            $timbreConditionImage = $stmt->fetchAll();
            return  $timbreConditionImage ;
    }
    /* public function selectUser(){
        $sql = "SELECT   timbre.*, user.username from $this->table
         INNER JOIN user ON utilisateur_id = user.id";
        $stmt = $this->query($sql);
        $timbreUser = $stmt->fetchAll();
        return $timbreUser;
    }  
 */


    
    
}

?>