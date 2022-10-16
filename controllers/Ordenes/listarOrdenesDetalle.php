<?php

require_once('/xampp/htdocs/Grissy/logic/gestorOrden.php');

try {
    if (isset($_GET['codigoordenes'])){
        $codigoordenes = $_GET['codigoordenes'];
        echo json_encode(obtenerListaDeDetalleOrden($codigoordenes), JSON_PRETTY_PRINT);

    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
