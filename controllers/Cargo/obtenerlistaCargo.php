<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCargo.php');

try {
    echo json_encode(obtenerListaDeCargo(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
