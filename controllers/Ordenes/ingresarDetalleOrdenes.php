<?php

require_once('/xampp/htdocs/Grissy/logic/gestorOrden.php');

try {

    if (isset($_POST['codigoOrden']) && isset($_POST['idProducto']) && isset($_POST['cantidad']) && isset($_POST['precio']) && isset($_POST['total'])) {
        $codigoOrden = $_POST['codigoOrden'];
        $idProducto = $_POST['idProducto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $total = $_POST['total'];

        echo json_encode(guardarDetalleOrden($codigoOrden, $idProducto, $cantidad, $precio,$total));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
