<?php

class Timbre extends CRUD {

    protected $table = 'timbre';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'date_creation','couleur' , 'tirage', 'dimensions', 'certife', 'pays', 'condition_timbre_id', 'user_id','image_id'];



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
        $sql = "SELECT timbre.*,image.id AS image_id, image.nom AS image_nom, condition_timbre.nom AS condition_nom FROM timbre
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

    public function deleteByUserId($user_id) {
        $sql = "DELETE FROM timbre WHERE user_id = $user_id";
        $stmt =  $this->query($sql);
        $deleteTimbre = $stmt->fetchAll();
        return $deleteTimbre ;

     
    }


    public function selectAllWithImageAndCondition() {
        $sql = "SELECT timbre.*, image.nom AS image_nom, condition_timbre.nom AS condition_nom 
                FROM timbre
                LEFT JOIN image ON timbre.id = image.timbre_id
                LEFT JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id";
        
        $stmt = $this->query($sql);
        $timbreConditionImage = $stmt->fetchAll();
        return $timbreConditionImage;


    
    }


    public function updateByTimbeId($timbre_id, $data) {
        // Créez la chaîne de mise à jour en fonction des données fournies dans le tableau $data
        $updateString = '';
        foreach ($data as $key => $value) {
            $updateString .= "$key = '$value', ";
        }
        // Supprimez la virgule et l'espace supplémentaire à la fin de la chaîne
        $updateString = rtrim($updateString, ', ');
    
        // Utilisez une requête préparée pour éviter les injections SQL
        $sql = "UPDATE timbre SET $updateString WHERE id = :id";
        $stmt = $this->prepare($sql);
        
        // Liez le paramètre :timbre_id
        $stmt->bindParam(':id', $timbre_id, PDO::PARAM_INT);
    
        // Exécutez la requête
        $stmt->execute();
    
        // Retournez le résultat si nécessaire
        return $stmt->fetchAll();
    }

/* 
 public function selectAllWithImageAndCondition() {
    $sql = "SELECT enchere.*, timbre.*, image.nom AS image_nom, condition_timbre.nom AS condition_nom 
            FROM enchere
            LEFT JOIN mise ON enchere.id = mise.enchere_id
            LEFT JOIN timbre ON mise.timbre_id = timbre.id
            LEFT JOIN image ON timbre.id = image.timbre_id
            LEFT JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id";

    $stmt = $this->query($sql);
    $enchereTimbreConditionImage = $stmt->fetchAll();
    return $enchereTimbreConditionImage;
}
 */

}

?>