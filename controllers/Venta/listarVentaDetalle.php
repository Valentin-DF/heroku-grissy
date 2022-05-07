<?php

require_once('/xampp/htdocs/Grissy/logic/gestorVenta.php');

try {
    if (isset($_GET['codigoVenta'])){
        $codigoVenta = $_GET['codigoVenta'];
        echo json_encode(obtenerListaDeDetalleVenta($codigoVenta), JSON_PRETTY_PRINT);

    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
