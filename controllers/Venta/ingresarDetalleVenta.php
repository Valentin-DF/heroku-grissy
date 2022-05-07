<?php

require_once('/xampp/htdocs/Grissy/logic/gestorVenta.php');

try {

    if (isset($_POST['codigoVenta']) && isset($_POST['idProducto']) && isset($_POST['cantidad']) && isset($_POST['precio']) && isset($_POST['total'])) {
        $codigoVenta = $_POST['codigoVenta'];
        $idProducto = $_POST['idProducto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $total = $_POST['total'];

        echo json_encode(guardarDetalleVenta($codigoVenta, $idProducto, $cantidad, $precio,$total));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
