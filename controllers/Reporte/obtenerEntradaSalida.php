<?php

require_once('/xampp/htdocs/Grissy/logic/gestorReporte.php');

try {

    if (isset($_GET['fechaInicio']) && isset($_GET['fechaFinal']) && isset($_GET['idEncargado']) && isset($_GET['idArea']) && isset($_GET['idProducto'])) {
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFinal = $_GET['fechaFinal'];
        $idEncargado = $_GET['idEncargado'];
        $idArea = $_GET['idArea'];
        $idProducto = $_GET['idProducto'];

        echo json_encode(obtenerEntradaSalida($fechaInicio, $fechaFinal, $idEncargado, $idArea, $idProducto), JSON_PRETTY_PRINT);
    } else {
        echo json_encode('No se obtuvo data');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
