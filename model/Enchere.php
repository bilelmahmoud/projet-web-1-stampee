<?php

class Enchere extends CRUD {

    protected $table = 'enchere';
    protected $primaryKey = 'id';

    protected $fillable = ['date_debut', 'date_fin', 'prix', 'coeur_lord', 'user_id' ];

    // public function selectAllWithImageAndConditionByUserId($user_id) {
    //     $sql = "SELECT enchere.*, image.nom AS image_nom
    //     FROM enchere
    //     LEFT JOIN timbre ON enchere.id = timbre.enchere_id
    //     LEFT JOIN image ON timbre.id = image.timbre_id
    //     WHERE timbre.user_id = $user_id";
    //     $stmt = $this->query($sql);
    //     $timbreConditionImage = $stmt->fetchAll();
    //     return $timbreConditionImage;
    // }

    public function selectAllWithImageAndConditionByUserId($user_id) {
    $sql = "SELECT timbre.*, image.nom AS image_nom, condition_timbre.nom AS condition_nom 
            FROM timbre
            LEFT JOIN image ON timbre.id = image.timbre_id
            LEFT JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id
            WHERE timbre.user_id = $user_id";

    $stmt = $this->query($sql);
    $timbreConditionImage = $stmt->fetchAll();
    return $timbreConditionImage;
}

   /*  public function selectAllWithImageAndConditionByUserId($user_id) {
    $sql = "SELECT enchere.*, timbre.*, image.nom AS image_nom, condition_timbre.nom AS condition_nom 
            FROM mise
            JOIN enchere ON mise.enchere_id = enchere.id
            JOIN timbre ON enchere.id = timbre.enchere_id
            LEFT JOIN image ON timbre.id = image.timbre_id
            LEFT JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id
            WHERE mise.user_id = $user_id";

    $stmt = $this->query($sql);
    $enchereTimbreConditionImage = $stmt->fetchAll();
    return $enchereTimbreConditionImage; */
    
    public function selectAllByUserId($user_id) {
        $sql = "SELECT * FROM enchere WHERE user_id = $user_id";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

   
       
        
   
    
}


?>