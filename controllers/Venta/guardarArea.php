<?php

require_once('/xampp/htdocs/Grissy/logic/gestorVenta.php');

try {

    if (isset($_POST['idCliente']) && isset($_POST['total']) && isset($_POST['igv']) && isset($_POST['subTotal'])&& isset($_POST['idPersonal'])&& isset($_POST['codigo'])) {

        $idCliente = $_POST['idCliente'];
        $total = $_POST['total'];
        $igv = $_POST['igv'];
        $subTotal = $_POST['subTotal'];
        $idPersonal = $_POST['idPersonal'];
        $codigo = $_POST['codigo'];

        echo json_encode(guardarVenta($idCliente,$total,$igv,$subTotal,$idPersonal,$codigo));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
