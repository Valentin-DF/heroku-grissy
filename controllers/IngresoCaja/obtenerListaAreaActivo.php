<?php

require_once('/xampp/htdocs/Grissy/logic/gestorIngresoCaja.php');

try {
    echo json_encode(obtenerListaDeIngresoCajaActivo(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
