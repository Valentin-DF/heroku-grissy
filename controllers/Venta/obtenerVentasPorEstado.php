<?php

require_once('/xampp/htdocs/Grissy/logic/gestorVenta.php');

try {
    if (isset($_POST['idempleado']) && isset($_POST['estado'])) {
        $idempleado = $_POST['idempleado'];
        $estado = $_POST['estado'];
        echo json_encode(obtenerVentasPorEstado($idempleado, $estado), JSON_PRETTY_PRINT);
    } else {
        echo json_encode('No se obtuvo data');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
