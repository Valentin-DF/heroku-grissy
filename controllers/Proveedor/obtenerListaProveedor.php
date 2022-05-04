<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProveedor.php');

try {
    echo json_encode(obtenerListaDeProveedor(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
