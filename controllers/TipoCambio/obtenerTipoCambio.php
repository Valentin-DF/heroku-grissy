<?php

require_once('/xampp/htdocs/Grissy/logic/gestorTipoCambio.php');

try {
    echo json_encode(obtenerListaDeTipoCambio(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
