<?php

require_once('/xampp/htdocs/Grissy/logic/gestorVenta.php');

try {

    if ( isset($_POST['total']) && isset($_POST['igv']) &&
     isset($_POST['subTotal'])&&  isset($_POST['codigo'])) {

        $total = $_POST['total'];
        $igv = $_POST['igv'];
        $subTotal = $_POST['subTotal'];
        $codigo = $_POST['codigo'];

        echo json_encode(editarVenta($total,$igv,$subTotal,$codigo));
    } else {
        echo json_encode('No se edito');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
