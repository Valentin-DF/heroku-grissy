<?php

require_once('/xampp/htdocs/Grissy/logic/gestorArea.php');

try {

    if (isset($_POST['codigo']) && isset($_POST['nombre'])) {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        
        echo json_encode(guardarArea($codigo,$nombre));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
