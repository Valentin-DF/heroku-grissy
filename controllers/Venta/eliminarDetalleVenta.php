<?php

require_once('/xampp/htdocs/Grissy/logic/gestorVenta.php');

try {

    if ( isset($_POST['id'])) {

        $id = $_POST['id'];


        echo json_encode(borrarDetalleVenta($id));
    } else {
        echo json_encode('No se elimino');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
