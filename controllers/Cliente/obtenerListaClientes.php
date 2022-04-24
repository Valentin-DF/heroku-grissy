<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCliente.php');

try {
    echo json_encode(obtenerListaDeClientes(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
