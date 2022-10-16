<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPersonal.php');

try {

    if (isset($_GET['documento'])) {
        $documento = $_GET['documento'];
        echo json_encode(buscarPersonalPorDocumento($documento), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }

} 
catch (Exception $e) {
    echo $e->getMessage();

}
