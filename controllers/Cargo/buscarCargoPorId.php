<?php

require_once('/xampp/htdocs/Grissy/logic/gestorCargo.php');

try {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo json_encode(buscarCargoPorId($id), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }

} 
catch (Exception $e) {
    echo $e->getMessage();

}
