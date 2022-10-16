<?php

require_once('/xampp/htdocs/Grissy/logic/gestorOrden.php');

try {

    if (isset($_POST['idProveedor']) && isset($_POST['total']) && isset($_POST['igv']) &&
     isset($_POST['subTotal'])&& isset($_POST['codigo']) && isset($_POST['idTipo'])  ) {

        $idProveedor = $_POST['idProveedor'];
        $total = $_POST['total'];
        $igv = $_POST['igv'];
        $subTotal = $_POST['subTotal'];
        $idTipo = $_POST['idTipo'];
        $codigo = $_POST['codigo'];

        echo json_encode(guardarOrden($idProveedor,$total,$igv,$subTotal,$codigo,$idTipo));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
