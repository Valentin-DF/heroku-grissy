<?php

require_once('/xampp/htdocs/Grissy/logic/gestorArea.php');

try {
    echo json_encode(obtenerListaDeArea(), JSON_PRETTY_PRINT);
} 
catch (Exception $e) {
    echo $e->getMessage();

}
