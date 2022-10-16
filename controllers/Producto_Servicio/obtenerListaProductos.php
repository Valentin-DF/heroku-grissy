<?php



require_once('/xampp/htdocs/Grissy/logic/gestorProducto_Servicio.php');

try {
    echo json_encode(obtenerListaDeProductos_Servicio(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
