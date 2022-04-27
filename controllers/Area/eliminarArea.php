<?php

require_once('/xampp/htdocs/Grissy/logic/gestorArea.php');

try {

    if (isset($_POST['id']) && isset($_POST['estado'])) {
        $id = $_POST['id'];
        $estado = $_POST['estado'];
        echo json_encode(eliminarArea($id,$estado));
    } else {
        echo json_encode('No se recibió el id');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
