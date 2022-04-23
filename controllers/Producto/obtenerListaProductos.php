<?php



require_once('/xampp/htdocs/Grissy/logic/gestorProducto.php');

try {
    echo json_encode(obtenerListaDeProductos(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
