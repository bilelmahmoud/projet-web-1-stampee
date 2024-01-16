<?php
require_once('CRUD.php');
class Favoris extends CRUD {

    protected $table = 'favoris';
    protected $primaryKey = 'id';
    protected $fillable = [ 'user_id', 'enchere_id', 'statut'];

    public function find($conditions) {
        $sql = "SELECT * FROM {$this->table} WHERE ";
        $whereConditions = [];

        foreach ($conditions as $column => $value) {
            $whereConditions[] = "$column = :$column";
        }

        $sql .= implode(' AND ', $whereConditions);

        $stmt = $this->prepare($sql);

        foreach ($conditions as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    
    // public function getFavorisByUserId($user_id) {
    //     $conditions = ['user_id' => $user_id];
    //     return $this->find($conditions);
    // }

    public function getEncheresFavoritesByUserId($user_id) {
        $sql = "SELECT enchere.id,
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
                FROM favoris
                JOIN enchere ON favoris.enchere_id = enchere.id
                JOIN timbre ON timbre.enchere_id = enchere.id
                JOIN image ON timbre.id = image.timbre_id
                JOIN condition_timbre ON timbre.condition_timbre_id = condition_timbre.id
                WHERE favoris.user_id = :user_id AND favoris.statut = 1"; // statut 1 pour les enchères favorites
    
        $stmt = $this->prepare($sql);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isEnchereFavori($enchere_id, $user_id) {
        $conditions = ['user_id' => $user_id, 'enchere_id' => $enchere_id];
        $enchereFavoris = $this->find($conditions);
        // print_r(!empty($enchereFavoris));
        // die();
    
        // var_dump($enchereFavoris);  // Affiche le résultat de la recherche dans la console


         
        return !empty($enchereFavoris);
    }

   
        // ... Autres méthodes de votre classe Favoris ...
    
        public function deleteEnchereFavori($enchere_id, $user_id) {
            $conditions = ['user_id' => $user_id, 'enchere_id' => $enchere_id];
            $enchereFavoris = $this->find($conditions);
    
            if (!empty($enchereFavoris)) {
                $this->delete($enchereFavoris[0]['id']);
            }
        }


        public function getFavorisByUserId($user_id) {
            // Remplacez le code ci-dessous par votre logique de récupération des favoris par ID utilisateur depuis la base de données
            // Assurez-vous de retourner un tableau d'IDs d'enchères favoris
            $query = "SELECT enchere_id FROM favoris WHERE user_id = :user_id";
            // ...
        
            // Exemple fictif : retourne un tableau avec des IDs d'enchères favoris
            return [1, 2, 3];
        }
  







   

}






?>