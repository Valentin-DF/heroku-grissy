<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProducto.php');

try {

    if (isset($_POST['idProducto']) && isset($_POST['cantidad'])) {
        $idProducto = $_POST['idProducto'];
        $cantidad = $_POST['cantidad'];


        echo json_encode(actualizarStock($idProducto,$cantidad));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
