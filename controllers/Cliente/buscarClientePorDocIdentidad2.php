<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCliente.php');

try {

    if (isset($_GET['docIdentidad'])) {
        $docIdentidad = $_GET['docIdentidad'];
        echo json_encode(buscarClientePorDocIdentidad2($docIdentidad), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }

} 
catch (Exception $e) {
    echo $e->getMessage();

}
