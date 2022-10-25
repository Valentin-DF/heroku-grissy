<?php

require_once('/xampp/htdocs/Grissy/logic/gestorLibroDiario.php');

try {

    if (isset($_GET['fecha']) ) {
        $fecha = $_GET['fecha'];
        echo json_encode(listaLibroDiario($fecha), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }

} 
catch (Exception $e) {
    echo $e->getMessage();

}
