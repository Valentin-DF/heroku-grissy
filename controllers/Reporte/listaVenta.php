<?php

require_once('/xampp/htdocs/Grissy/logic/gestorReporte.php');

try {
    echo json_encode(listaVenta(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
