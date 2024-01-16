<?php

class Enchere extends CRUD {

    protected $table = 'enchere';
    protected $primaryKey = 'id';

    protected $fillable = ['date_debut', 'date_fin', 'prix', 'coeur_lord', 'user_id' ];

   

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

  
    
    public function selectAllByUserId($user_id) {
        $sql = "SELECT * FROM enchere WHERE user_id = $user_id";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

  


    public function afficheEnchere() {
       
        $sql = " SELECT     enchere.id,
                            enchere.date_debut,
                            enchere.date_fin,
                            enchere.prix,
                            enchere.coeur_lord,
    
                            timbre.nom,
                            timbre.couleur,
                            timbre.tirage,
                            timbre.dimensions,
                            timbre.certifie,
                            timbre.pays,
                            timbre.condition_timbre_id,
                            timbre.user_id,
                            image.nom as image_nom,
                            condition_timbre.nom as condition_nom
                            FROM enchere
    
                            JOIN
                            timbre ON timbre.enchere_id = enchere.id 
                            join
                            image on timbre.id = image.timbre_id
                            join 
                            condition_timbre on timbre.condition_timbre_id =  condition_timbre.id
    
    
    
    
                         ";
                         $stmt = $this->query($sql);
                         return $stmt->fetchAll();
        
    
      
    }

    public function afficheEnchereParId($id) {
       
        $sql = " SELECT     enchere.id,
                            enchere.date_debut,
                            enchere.date_fin,
                            enchere.prix,
                            enchere.coeur_lord,
    
                            timbre.nom,
                            timbre.couleur,
                            timbre.tirage,
                            timbre.dimensions,
                            timbre.certifie,
                            timbre.pays,
                            timbre.condition_timbre_id,
                            timbre.user_id,
                            image.nom as image_nom,
                            condition_timbre.nom as condition_nom
                            FROM enchere
    
                            JOIN
                            timbre ON timbre.enchere_id = enchere.id 
                            join
                            image on timbre.id = image.timbre_id
                            join 
                            condition_timbre on timbre.condition_timbre_id =  condition_timbre.id
                            WHERE enchere.id = $id
    
    
    
    
                         ";
                         $stmt = $this->query($sql);
                         return $stmt->fetchAll();
        
    
      
    }


    // public function getDernierPrix($enchere_id) {
    //     $sql = "SELECT prix FROM enchere WHERE id = $enchere_id";
    //     $stmt = $this->query($sql);
    //     return $stmt->fetchAll();
     
    // }

    public function getDernierPrix($enchere_id) {
        $sql = "SELECT prix FROM enchere WHERE id = :enchere_id";
        $params = [':enchere_id' => $enchere_id];
        
        // Utilisation de la méthode selectId de la classe parente (CRUD) pour exécuter la requête préparée
        $result = $this->selectId($enchere_id);
    
        // Retournez directement la valeur du dernier prix
        return ($result && !empty($result)) ? $result['prix'] : 0;
    }

    function recupererEncheres($condition) {
     
            $sql = "SELECT nom, condition FROM encheres WHERE condition = ?";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$condition]);
    
            // Récupérer les résultats de la requête
            $encheres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $encheres;
   
    }
   


    

   

   
    
}


?>