<?php 
    require_once('fonctionsDB.php');

    // $request_payload = file_get_contents('php://input');
    // $data = json_decode($request_payload, true);

    
    // if (isset($data['nom']) && isset($data['id'])) {

    //     $nom = htmlspecialchars($data['nom']);
    //     $id = htmlspecialchars($data['id']);

    //     changeNomEquipe($nom, $id);

    // } else {
    //     echo 'Erreur query string';
    // }

    $request_payload = file_get_contents('php://input');
    $data = json_decode($request_payload, true);
    
    if (isset($data['condition'])) {
        $condition = htmlspecialchars($data['condition']);
    
        $encheresFiltrees = filtrerEncheresParCondition($condition);
    
        // Utilisez $encheresFiltrees comme nécessaire (par exemple, renvoyez en tant que JSON)
        header('Content-Type: application/json');
        echo json_encode($encheresFiltrees);
    } else {
        echo 'Erreur dans les données JSON';
    }
?>