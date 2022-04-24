<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCliente.php');

try {

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        echo json_encode(eliminarCliente($id));
    } else {
        echo json_encode('No se recibió el id');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
