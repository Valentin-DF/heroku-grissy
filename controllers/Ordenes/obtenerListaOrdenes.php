<?php

require_once('/xampp/htdocs/Grissy/logic/gestorOrden.php');

try {
    if (isset($_GET['tipo'])){
        $tipo = $_GET['tipo'];
        echo json_encode(ListaDeDetalleOrdenes($tipo), JSON_PRETTY_PRINT);

    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
