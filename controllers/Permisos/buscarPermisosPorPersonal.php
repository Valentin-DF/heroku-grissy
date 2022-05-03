<?php

require_once('/xampp/htdocs/Grissy/logic/gestorPermisos.php');

try {

    if (isset($_GET['idpersonal'])) {
        $id = $_GET['idpersonal'];
        echo json_encode(buscarPermisosPorPersonal($id), JSON_PRETTY_PRINT);
    }else {
        echo json_encode('No se obtuvo data');
    }
} 
catch (Exception $e) {
    echo $e->getMessage();

}
