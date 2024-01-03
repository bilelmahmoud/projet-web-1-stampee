<?php

class Timbre extends CRUD {

    protected $table = 'timbre';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'date_creation','couleur' , 'tirage', 'dimensions', 'certifie', 'pays', 'condition_timbre_id', 'user_id','image_id'];



 


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
        $sql = "SELECT timbre.*,image.id AS image_id, image.nom AS image_nom, condition_timbre.nom AS condition_nom FROM timbre
            LEFT JOIN image ON timbre.id = image.timbre_id
            LEFT JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id
            WHERE timbre.id = $id";
            $stmt = $this->query($sql);
            $timbreConditionImage = $stmt->fetchAll();
            return  $timbreConditionImage ;
    }


    
   
    public function deleteByUserId($user_id) {
        $sql = "DELETE FROM timbre WHERE user_id = $user_id";
        $stmt =  $this->query($sql);
        $deleteTimbre = $stmt->fetchAll();
        return $deleteTimbre ;

     
    }



    public function updateByTimbeId($timbre_id, $data) {
       
        $updateString = '';
        foreach ($data as $key => $value) {
            $updateString .= "$key = '$value', ";
        }
       
        $updateString = rtrim($updateString, ', ');
    
      
        $sql = "UPDATE timbre SET $updateString WHERE id = :id";
        $stmt = $this->prepare($sql);
      
        $stmt->bindParam(':id', $timbre_id, PDO::PARAM_INT);
    
     
        $stmt->execute();
    
      
        return $stmt->fetchAll();
    }












}

?>