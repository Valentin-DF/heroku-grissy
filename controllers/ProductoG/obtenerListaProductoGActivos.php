<?php



require_once('/xampp/htdocs/Grissy/logic/gestorProductoG.php');

try {
    echo json_encode(obtenerListaDeProductoG(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
