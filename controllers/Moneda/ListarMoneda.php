<?php

require_once('/xampp/htdocs/Grissy/logic/gestorMoneda.php');

try {
    echo json_encode(obtenerListaDeMoneda(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
