<?php
require_once('CRUD.php');
class Image extends CRUD {

    protected $table = 'image';
    protected $primaryKey = 'id';
    protected $fillable = ['nom','type','timbre_id' ];
   




    public function selectByTimbreId($timbreId) {
        $sql = "SELECT * FROM image  WHERE timbre_id = :timbre_id";
        $params = [':timbre_id' => $timbreId];

    
        return $result;
    }

    
    public function deleteByTimbreId($timbre_id) {
        $sql = "DELETE FROM image WHERE timbre_id = $timbre_id ";
        $stmt =  $this->query($sql);
        $deleteImage = $stmt->fetchAll();
        return  $deleteImage ;
    }


}
?>