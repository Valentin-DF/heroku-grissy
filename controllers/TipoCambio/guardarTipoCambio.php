<?php

require_once('/xampp/htdocs/Grissy/logic/gestorTipoCambio.php');

try {

    if (isset($_POST['compra']) && isset($_POST['venta']) && isset($_POST['fecha'])) {



            $compra = $_POST['compra'];
            $venta = $_POST['venta'];
            $fecha = $_POST['fecha'];

            guardarTipoCamnio($compra, $venta, $fecha);
            
    } else {
        $mensaje  = array(
            "warning" => "false",
            "msj" => "Eror en el tipo cambio",
            "color" => "linear-gradient(to right, #ff5c74,  #e30e2e )"
        );
        echo json_encode($mensaje);
    }
} catch (Exception $e) {

    echo json_encode($e->getMessage());
}
