<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProducto.php');

try {

    if (isset($_GET['nombrePro']) &&isset($_GET['tipo'])) {
        $nombrePro = $_GET['nombrePro'];
        $tipo = $_GET['tipo'];
        echo json_encode(buscarProductoPorNombreTipo($nombrePro,$tipo), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }

} 
catch (Exception $e) {
    echo $e->getMessage();

}
