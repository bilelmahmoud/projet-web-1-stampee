<?php
require_once('CRUD.php');
class Mise extends CRUD {

    protected $table = 'mise';
    protected $primaryKey = 'id';
    protected $fillable = ['enchere_id', 'user_id', 'mise_date', 'mise_prix'];


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

    public function getMisesByUserId($user_id) {
        $conditions = ['user_id' => $user_id];
        return $this->find($conditions);
    }

   

}






?>