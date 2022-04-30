<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProducto.php');

try {

    if (isset($_GET['nombrePro'])) {
        $nombrePro = $_GET['nombrePro'];
        echo json_encode(buscarProductoPorNombre($nombrePro), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }

} 
catch (Exception $e) {
    echo $e->getMessage();

}
