<?php

require_once('/xampp/htdocs/Grissy/logic/gestorReporte.php');

try {

    if (isset($_GET['fechaInicio']) && isset($_GET['fechaFinal']) && isset($_GET['idEncargado'])) {
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFinal = $_GET['fechaFinal'];
        $idEncargado = $_GET['idEncargado'];


        echo json_encode(obtenerVenta($fechaInicio, $fechaFinal, $idEncargado), JSON_PRETTY_PRINT);
    } else {
        echo json_encode('No se obtuvo data');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
