<?php

require_once('/xampp/htdocs/Grissy/logic/gestorArea.php');

try {

    if (isset($_POST['id']) && isset($_POST['nombre'])) {
        $codigo = $_POST['id'];
        $nombre = $_POST['nombre'];
        
        echo json_encode(editarArea($id,$nombre));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
