<?php

require_once('/xampp/htdocs/Grissy/logic/gestorProveedor.php');

try {

    if ( isset($_POST['docIdentidad'])) {

        $docIdentidad = $_POST['docIdentidad'];

        
        echo json_encode(exixtenciaProveedor($docIdentidad));
    } else {
        echo json_encode('No se guardo');
    }
} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
